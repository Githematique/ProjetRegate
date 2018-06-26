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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('bateau')->orderBy('nom', 'ASC')->get()->all();
        return view('/boatViews/boatsAdmin', compact('datas'));
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

        return redirect('/admin/boat');
    }

    public function updateBoat(Request $request, $bateau_id)
    {
        $inputs['serie'] = Input::get('serie');
        $inputs['nom'] = Input::get('name');
        $inputs['numVoile'] = Input::get('numVoile');
        DB::table('bateau')->where("bateau_id", $bateau_id)->update($inputs);

        return redirect('/admin/boat');
    }

    public function delete($id)
    {
        $boat = \DB::table('bateau')->where('bateau_id', '=', $id);
        if (!is_null($boat)) {
            $boat->delete();
        }
        return redirect('/admin/boat');
    }


    //get page "addCrewToBoat"
    public function getBoatAndCrews($id)
    {
        $boat = DB::table('bateau')->where("bateau_id", $id)->first();
        $serializedArr = unserialize($boat->equipiers);
        $crews = DB::table('equipier')->get()->all();
        return view('/boatViews/addCrewToBoat',  compact('boat', 'crews'))->with('equipiers', $serializedArr);
    }

    //add a crew to boat
    public function addCrew($bateau_id, $equipier_id)
    {
        $inputs = array(strval($equipier_id) => Input::get('lastName').' '.Input::get('firstName'));


        $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
        if (strlen($boat->equipiers) <=0) {
          $serializedArr = serialize($inputs);

          DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);
        } else {
          $listOfCrew = unserialize($boat->equipiers);
          $newArray = array_merge($listOfCrew, $inputs);

          $serializedArr = serialize($newArray);
          DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);
        }

        $crews = DB::table('equipier')->get()->all();

        return redirect()->route('adminBoat.addCrewView', ['boatId' => $bateau_id]);
    }

    //remove a crew from boat
    public function removeCrew($bateau_id, $equipier_id)
    {
        $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
        $listOfCrew = unserialize($boat->equipiers);
        foreach ($listOfCrew as $key => $crew) {
          if ($key == $equipier_id) {
            unset($listOfCrew[$key]);
            break;
          }
        }
        $serializedArr = serialize($listOfCrew);
        DB::table('bateau')->where("bateau_id", $bateau_id)->update(['equipiers' => $serializedArr]);
        return redirect()->route('adminBoat.addCrewView', ['boatId' => $bateau_id]);
    }
}
