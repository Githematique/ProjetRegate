<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon;

class SerieAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function addSerieView()
    {
      return view('serieViews/addSerieAdmin');
    }

    public function store(Request $request)
    {
        $inputs['type'] = Input::get('type');
        $inputs['coeff'] = Input::get('coefficient');
        DB::table('seriebateau')->insert($inputs);
        return redirect('/admin/gestion');
    }

    public function updateSerie(Request $request, $id)
    {
        $inputs['type'] = Input::get('type');
        $inputs['coeff'] = Input::get('coefficient');
        DB::table('seriebateau')->where("id", $id)->update($inputs);

        return redirect('/admin/gestion');
    }

    public function getSerieView($id)
    {
        $serie = DB::table('seriebateau')->where("id", $id)->first();

        return view('/serieViews/updateSerieAdmin')->with('serie', $serie);
    }

    public function delete($id)
    {
        $serie = \DB::table('seriebateau')->where('id', '=', $id);
        if (!is_null($serie)) {
            $serie->delete();
        }
        return redirect('/admin/gestion');
    }
}
