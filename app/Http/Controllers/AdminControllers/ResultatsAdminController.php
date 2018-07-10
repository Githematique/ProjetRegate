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

        $podiumBoats = DB::table('bateau')->whereIn('bateau_id', $currentBoats)->where('temps', "!=", null)->orderBy('temps', 'asc')->get()->all();
        return view('resultatsAdmin', compact('boats', 'podiumBoats'))->with('regate', $regate);
    }

    public function store(Request $request)
    {
        $inputs['nom'] = Input::get('name');
        DB::table('bateau')->insert($inputs);
        return redirect('/admin');
    }

    public function generateExcel()
    {

      // Execute the query used to retrieve the data. In this example
      // we're joining hypothetical users and payments tables, retrieving
      // the payments table's primary key, the user's first and last name,
      // the user's e-mail address, the amount paid, and the payment
      // timestamp.

      $regate = DB::table('regate')->get()->first();
      $currentBoats = array();
      if (!is_null($regate->bateaux) &&strlen($regate->bateaux)) {
          $currentBoats = unserialize($regate->bateaux);
      }
      // $boats = DB::table('bateau')->whereIn('bateau_id', $currentBoats)->get()->all();

      $podiumBoats = DB::table('bateau')->whereIn('bateau_id', $currentBoats)->where('temps', "!=", null)->orderBy('temps', 'asc')->get()->all();

      $boatsArray = [];
      // Convert each member of the returned collection into an array,
      // and append it to the payments array.
      foreach ($podiumBoats as $key=>$boat) {
        array_push($boatsArray, $boat->nom);
         // $boatsArray[$i] = $boat->nom;
         // $i++;
      }

      // foreach ($boatsArray as $key => $value) {
      //   echo $boatsArray[$key];
      // }

      return \Excel::create('hdtuto_demo', function ($excel) use ($boatsArray) {
          $excel->sheet('sheet name', function ($sheet) use ($boatsArray) {
            for ($i=1; $i <= count($boatsArray); $i++) {
              $sheet->row($i, array($i, $boatsArray[$i-1]));
            }

          });
      })->download('xls');
    }

}
