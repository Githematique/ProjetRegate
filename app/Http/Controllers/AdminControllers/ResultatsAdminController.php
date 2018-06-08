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
      $datas = DB::table('bateau')->orderBy('nom', 'ASC')->get()->all();
      return view('resultatsAdmin', compact('datas'));
    }
    public function store(Request $request) {
      $inputs['nom'] = Input::get('name');
      DB::table('bateau')->insert($inputs);
      return redirect('/admin');
  }
}
