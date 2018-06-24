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

    public function getBoat($bateau_id){

      $boat = DB::table('bateau')->where("bateau_id", $bateau_id)->first();
      return view('/boatViews/updateBoatAdmin', compact('boat'));
    }

    public function store(Request $request) {

      $inputs['serie'] = Input::get('serie');

      $inputs['nom'] = Input::get('name');

      $inputs['numVoile'] = Input::get('numVoile');

      DB::table('bateau')->insert($inputs);

      return redirect('/admin/boat');
  }

  public function updateBoat(Request $request, $bateau_id){

    $inputs['serie'] = Input::get('serie');

    $inputs['nom'] = Input::get('name');

    $inputs['numVoile'] = Input::get('numVoile');

    DB::table('bateau')->where("bateau_id", $bateau_id)->update($inputs);

    return redirect('/admin/boat');
  }

  public function delete($id){

    $boat = \DB::table('bateau')->where('bateau_id', '=', $id);

     if (!is_null($boat)) {
        $boat->delete();
    }

    return redirect('/admin/boat');
  }
}
