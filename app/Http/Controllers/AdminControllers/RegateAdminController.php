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

      $boats = DB::table('bateau')->get()->all();
      $regateBoats = array();
      $toBeAddedBoats = $boats;
      if (!is_null($regate->bateaux) && !empty($regate->bateaux)) {
        $regateBoats= unserialize($regate->bateaux);
        if ( count($regateBoats) >= 1 ) {
          foreach ($regateBoats as $key => $regateBoat) {
            foreach ($toBeAddedBoats as $index => $boat) {
              if ($boat->bateau_id == $regateBoat) {
                unset($toBeAddedBoats[$index]);
                continue;
              }
            }
          }
        }
      }
      return view('/regateViews/createRegateAdmin',compact('boats', 'regateBoats', 'toBeAddedBoats'))->with('regate', $regate);
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

    public function addBoatToRegate( $bateau_id) {

      $boatsIds = array($bateau_id);
      $regate = DB::table('regate')->get()->first();
      if (strlen($regate->bateaux) <=0) {
        $serializedArr = serialize($boatsIds);
        DB::table('regate')->update(['bateaux' => $serializedArr]);
      } else {
        $listOfBoat = unserialize($regate->bateaux);
        $newArray = array_merge($listOfBoat,$boatsIds);
        $serializedArr = serialize($newArray);
        DB::table('regate')->update(['bateaux' => $serializedArr]);
      }

      return redirect('/admin/regate');
    }


    public function removeBoatFromRegate( $bateau_id) {

      $boatsIds = array($bateau_id);
      $regate = DB::table('regate')->get()->first();
      if (!(strlen($regate->bateaux) <=0)) {
        $currentListOfBoat = unserialize($regate->bateaux);
        foreach ($currentListOfBoat as $key => $currentBoat) {
          if ($currentBoat == $bateau_id) {
            unset($currentListOfBoat[$key]);
          }
        }
        $serializedArr = serialize($currentListOfBoat);
        DB::table('regate')->update(['bateaux' => $serializedArr]);
      }

      return redirect('/admin/regate');
    }

    //add all Created boats to the current regate
    //dont add duplicate
    public function addAllBoatsToRegate() {
      $regate = DB::table('regate')->get()->first();

      $currentBoats = unserialize($regate->bateaux);
      if (strlen($regate->bateaux) >0 && count($currentBoats) > 0) {
        $boatsIds = DB::table('bateau')->whereNotIn('bateau_id', $currentBoats)->pluck('bateau_id')->toArray();
      } else {
        $boatsIds = DB::table('bateau')->where('bateau_id', '>', 0)->pluck('bateau_id')->toArray();
      }
      if (strlen($regate->bateaux) <=0) {
        $serializedArr = serialize($boatsIds);
        DB::table('regate')->update(['bateaux' => $serializedArr]);
      } else {
        $listOfBoat = unserialize($regate->bateaux);
        $newArray = array_merge($listOfBoat,$boatsIds);
        $serializedArr = serialize($newArray);
        DB::table('regate')->update(['bateaux' => $serializedArr]);
      }

      return redirect('/admin/regate');
    }

    //remove all boats from a regate
    public function removeAllBoatsFromRegate() {
      $regate = DB::table('regate')->update(['bateaux' => '']);
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
