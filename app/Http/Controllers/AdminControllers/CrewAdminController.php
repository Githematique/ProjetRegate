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

    $crew = \DB::table('equipier')->where('equipier_id', '=', $id);

     if (!is_null($crew)) {
        $crew->delete();
    }

    return redirect('/admin/gestion');
  }
}
