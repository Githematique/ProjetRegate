<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon;

class RegateAdminController extends Controller
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

      return view('/regateViews/createRegateAdmin')->with('regate', $regate);
    }

    public function updateRegate(Request $request, $regate_id) {

      $inputs['nom'] = Input::get('name');
      $inputs['date'] = Input::get('date');
      $inputs['club'] = Input::get('club');
      $inputs['ligue'] = Input::get('ligue');
      $inputs['jury'] = Input::get('jury');
      $inputs['comiteDeCourse'] = Input::get('committee');
      $inputs['securite'] = Input::get('security');
      $inputs['officierDeJour'] = Input::get('officer');
      $inputs['etape'] = 0;
      DB::table('regate')->where("regate_id", $regate_id)->update($inputs);
      return redirect('/admin/regate');
    }

    public function updateStartTimeRegate(Request $request) {
     
        $heure_dep = $request->heure_dep; 
        DB::table('regate')->update(['heure_dep' => $heure_dep]);
      
    }

    public function updateEndTimeRegate(Request $request) {
     
        $heure_arr = $request->heure_arr; 
        DB::table('regate')->update(['heure_arr' => $heure_arr]);
      
    }

}
