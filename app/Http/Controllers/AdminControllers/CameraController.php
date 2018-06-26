<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;

class CameraController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('camera');
    }
}
