<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;

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
}
