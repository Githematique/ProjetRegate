<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use DB;
use Carbon;
use JavaScript;


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

        JavaScript::put([
          'boats' => $boats,
          'podiumBoats' => $podiumBoats,
          'regate' => $regate
        ]);
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

      $regate = DB::table('regate')->get()->first();
      $currentBoats = array();
      if (!is_null($regate->bateaux) &&strlen($regate->bateaux)) {
          $currentBoats = unserialize($regate->bateaux);
      }

      $podiumBoats = DB::table('bateau')->whereIn('bateau_id', $currentBoats)->where('temps', "!=", null)->orderBy('temps', 'asc')->get()->all();

      $boatsArray = [];
      foreach ($podiumBoats as $key=>$boat) {
        array_push($boatsArray, $boat->nom);
      }

      return \Excel::create('hdtuto_demo', function ($excel) use ($boatsArray) {
          $excel->sheet('sheet name', function ($sheet) use ($boatsArray) {
            for ($i=1; $i <= count($boatsArray); $i++) {
              $sheet->row($i, array($i, $boatsArray[$i-1]));
            }

          });
      })->download('xls');
    }

}
