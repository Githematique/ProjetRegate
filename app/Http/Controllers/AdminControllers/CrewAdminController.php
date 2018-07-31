<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon;

class CrewAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function addCrewView()
    {
      return view('/crewViews/addCrewAdmin');
    }

    public function getCrew($equipier_id){

      $crew = DB::table('equipier')->where("equipier_id", $equipier_id)->first();
      return view('/crewViews/updateCrewAdmin', compact('crew'));
    }

    public function store(Request $request) {

      $inputs['nom'] = Input::get('lastName');

      $inputs['prenom'] = Input::get('firstName');

      $inputs['role'] = $request->input('role');

      DB::table('equipier')->insert($inputs);

      return redirect('/admin/gestion');
  }

  public function updateCrew(Request $request, $equipier_id){

    $inputs['nom'] = Input::get('lastName');

    $inputs['prenom'] = Input::get('firstName');

    $inputs['role'] = $request->input('role');

    DB::table('equipier')->where("equipier_id", $equipier_id)->update($inputs);

    return redirect('/admin/gestion');
  }

  public function delete($id){

    $crewQuery = \DB::table('equipier')->where('equipier_id', '=', $id);

    $crew = DB::table('equipier')->where('equipier_id', $id)->first();
    $boat = DB::table('bateau')->where("bateau_id", $crew->id_bateau)->first();
    $listOfCrew = array();
    if (!is_null($boat) && !is_null($boat->equipiers) && strlen($boat->equipiers) > 0) {
      $listOfCrew = unserialize($boat->equipiers);
      foreach ($listOfCrew as $key => $boatCrew) {
        if ($key == $id) {
          unset($listOfCrew[$key]);
          break;
        }
      }
    }

    $serializedArr = serialize($listOfCrew);
    DB::table('bateau')->where("bateau_id", $crew->id_bateau)->update(['equipiers' => $serializedArr]);

     if (!is_null($crewQuery)) {
        $crewQuery->delete();
    }
    //
    return redirect('/admin/gestion');
  }
}
