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
        return view('/boatViews/addBoatAdmin');
    }

    public function getBoat($bateau_id)
    {
        $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
        return view('/boatViews/updateBoatAdmin', compact('boat'));
    }

    public function store(Request $request)
    {
        $inputs['serie'] = Input::get('serie');
        $inputs['nom'] = Input::get('name');
        $inputs['numVoile'] = Input::get('numVoile');
        DB::table('bateau')->insert($inputs);

        return redirect('/admin/gestion');
    }

    public function updateBoat(Request $request, $bateau_id)
    {
        $inputs['serie'] = Input::get('serie');
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
              if ($crew->occupe == true) {
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

        if($crew->occupe == true) {
          return null;
        }

        $inputs = array(strval($equipier_id) => Input::get('lastName').' '.Input::get('firstName'));

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
        DB::table('equipier')->where('equipier_id', $equipier_id)->update(['occupe' => true]);
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
            DB::table('equipier')->where('equipier_id', $equipier_id)->update(['occupe' => false]);
            break;
          }
        }
        $serializedArr = serialize($listOfCrew);
        DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);

        return redirect()->route('adminBoat.addCrewView', ['boatId' => $bateau_id]);
    }
}
