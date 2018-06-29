<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon;

class BoatAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function addBoatView()
    {
        $series = DB::table('seriebateau')->get()->all();
        return view('/boatViews/addBoatAdmin', compact('series'));
    }

    public function getBoat($bateau_id)
    {
        $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
        $series = DB::table('seriebateau')->get()->all();
        return view('/boatViews/updateBoatAdmin', compact('boat', 'series'));
    }

    public function store(Request $request)
    {
        $inputs['serie'] = $request->input('serie');
        $serie = DB::table('seriebateau')->where("type", $inputs['serie'])->first();
        $inputs['coefficient'] = $serie->coeff;
        $inputs['nom'] = Input::get('name');
        $inputs['numVoile'] = Input::get('numVoile');

        DB::table('bateau')->insert($inputs);

        return redirect('/admin/gestion');
    }

    public function updateBoat(Request $request, $bateau_id)
    {
        $inputs['serie'] =  $request->input('serie');
        $serie = DB::table('seriebateau')->where("type", $inputs['serie'])->first();
        $inputs['coefficient'] = $serie->coeff;
        $inputs['nom'] = Input::get('name');
        $inputs['numVoile'] = Input::get('numVoile');
        DB::table('bateau')->where("bateau_id", $bateau_id)->update($inputs);

        return redirect('/admin/gestion');
    }

    public function delete($id)
    {
        $boat = \DB::table('bateau')->where('bateau_id', '=', $id);
        if (!is_null($boat)) {
            $boat->delete();
        }
        return redirect('/admin/gestion');
    }


    //get page "addCrewToBoat"
    //Unserializing a string as an array
    public function getBoatAndCrews($id)
    {
        $boat = DB::table('bateau')->where("bateau_id", $id)->first();
        $crews = DB::table('equipier')->get()->all();
        $serializedArr = array();
        if (!is_null($boat->equipiers) &&  !empty($boat->equipiers)) {
          $serializedArr = unserialize($boat->equipiers);
          if (strlen($boat->equipiers) > 0 && count($serializedArr) >= 1 ) {
            foreach ($crews as $key => $crew) {
              foreach ($serializedArr as $crew_id => $equipier) {
                if ($crew_id == $crew->equipier_id) {
                  unset($crews[$key]);
                  continue;
                }
              }
              if (!is_null($crew->id_bateau) && $crew->id_bateau > 0) {
                unset($crews[$key]);
              }
            }
          }
        }
        return view('/boatViews/addCrewToBoat',  compact('boat', 'crews'))->with('equipiers', $serializedArr);
    }

    //add a crew to boat
    //Serializing an array to transforms it to a string so we can store it in the DB
    public function addCrew($bateau_id, $equipier_id)
    {
        $crew = DB::table('equipier')->where('equipier_id', $equipier_id)->first();

        if(!is_null($crew->id_bateau) && $crew->id_bateau > 0) {
          return null;
        }

        $inputs = array(strval($equipier_id) => $crew->nom.' '.$crew->prenom);

        $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
        if (strlen($boat->equipiers) <=0) {
          $serializedArr = serialize($inputs);
          DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);
        } else {
          $listOfCrew = unserialize($boat->equipiers);
          $newArray = $listOfCrew + $inputs;
          $serializedArr = serialize($newArray);
          DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);
        }
        DB::table('equipier')->where('equipier_id', $equipier_id)->update(['id_bateau' => $bateau_id]);
        return redirect()->route('adminBoat.addCrewView', ['boatId' => $bateau_id]);
    }

    //remove a crew from boat
    //Serializing an array to transforms it to a string so we can store it in the DB
    public function removeCrew($bateau_id, $equipier_id)
    {
        $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
        $listOfCrew = unserialize($boat->equipiers);
        foreach ($listOfCrew as $key => $crew) {
          if ($key == $equipier_id) {
            unset($listOfCrew[$key]);
            DB::table('equipier')->where('equipier_id', $equipier_id)->update(['id_bateau' => 0]);
            break;
          }
        }
        $serializedArr = serialize($listOfCrew);
        DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);

        return redirect()->route('adminBoat.addCrewView', ['boatId' => $bateau_id]);
    }

    //Set the time of the boat for the current regate
    public function setTime(Request $request, $bateau_id)
    {
      $time = $request->time;
      echo $request;
      if (!is_null($time)) {
        DB::table('bateau')->where('bateau_id', $bateau_id)->update(['temps' => $time]);
        return 'true';
      }
      abort(400, 'No time found');
    }
}
