<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use DB;
use Carbon;
class ResultatsAdminController extends Controller
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
      $regate = DB::table('regate')->get()->first();
      $currentBoats = array();
      if (!is_null($regate->bateaux) &&strlen($regate->bateaux)) {
        $currentBoats = unserialize($regate->bateaux);
      }
      $boats = DB::table('bateau')->whereIn('bateau_id', $currentBoats)->get()->all();
      return view('resultatsAdmin', compact('boats'))->with('regate', $regate);
    }

    public function store(Request $request) {
      $inputs['nom'] = Input::get('name');
      DB::table('bateau')->insert($inputs);
      return redirect('/admin');
  }
}
