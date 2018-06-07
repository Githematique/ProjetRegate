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
        return view('boatAdmin');
    }


    public function store(Request $request) {

      $inputs['serie'] = Input::get('serie');

      $inputs['nom'] = Input::get('name');

      $inputs['numVoile'] = Input::get('numVoile');

      DB::table('bateau')->insert($inputs);

      return redirect('/');
  }
}
