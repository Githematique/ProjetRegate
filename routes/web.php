<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



Route::group(['middleware' => 'under-construction'], function () {

  Route::get('/ledOn', 'AdminControllers\AdminController@ledOn');

  Route::get('/', 'AdminControllers\AdminController@index')->name('accueil');


  //Dashboard to manage results and the camera
  Route::get('/admin/', 'AdminControllers\ResultatsAdminController@index')->name('resultats');
  Route::get('/admin/excel', 'AdminControllers\ResultatsAdminController@generateExcel')->name('resultats.excel');

  Route::get('/admin/camera', 'AdminControllers\CameraController@index')->name('camera');

  //Dashboard to manage boats and crews
  Route::get('/admin/gestion', 'AdminControllers\AdminController@gestionAdminView')->name('adminGestion');

  //Boats Routing
  Route::get('/admin/boat/add', 'AdminControllers\BoatAdminController@addBoatView')->name('adminBoat.add');
  Route::get('/admin/boat/update/{boatId}', 'AdminControllers\BoatAdminController@getBoat')->name('adminBoat.update');
  Route::post('/admin/boat/update/{boatId}', 'AdminControllers\BoatAdminController@updateBoat');
  Route::post('/admin/boat/add', 'AdminControllers\BoatAdminController@store');
  Route::get('/admin/boat/delete/{boatId}', 'AdminControllers\BoatAdminController@delete');
  Route::post('/admin/boat/setTime/{boatId}', 'AdminControllers\BoatAdminController@setTime');
  Route::get('/admin/boat/resetTime/{boatId}', 'AdminControllers\BoatAdminController@resetTime');
  // add crew to boat routing
  Route::get('/admin/boat/addCrew/{boatId}', 'AdminControllers\BoatAdminController@getBoatAndCrews')->name('adminBoat.addCrewView');
  Route::post('/admin/boat/addCrew/{boatId}/{crewId}', 'AdminControllers\BoatAdminController@addCrew')->name('adminBoat.addCrew');
  Route::get('/admin/boat/removeCrew/{boatId}/{crewId}', 'AdminControllers\BoatAdminController@removeCrew')->name('adminBoat.removeCrew');

  //Crew Routing
  Route::get('/admin/crew/add', 'AdminControllers\CrewAdminController@addCrewView')->name('adminCrew.add');
  Route::get('/admin/crew/update/{crewId}', 'AdminControllers\CrewAdminController@getCrew')->name('adminCrew.update');
  Route::post('/admin/crew/update/{crewId}', 'AdminControllers\CrewAdminController@updateCrew');
  Route::post('/admin/crew/add', 'AdminControllers\CrewAdminController@store');
  Route::get('/admin/crew/delete/{crewId}', 'AdminControllers\CrewAdminController@delete');

  //Serie Routing
  Route::get('/admin/serie/add', 'AdminControllers\SerieAdminController@addSerieView')->name('adminSerie.add');
  Route::get('/admin/serie/update/{serieId}', 'AdminControllers\SerieAdminController@getSerieView')->name('adminSerie.update');
  Route::post('/admin/serie/add', 'AdminControllers\SerieAdminController@store');
  Route::post('/admin/serie/update/{serieId}', 'AdminControllers\SerieAdminController@updateSerie');
  Route::get('/admin/serie/delete/{serieId}', 'AdminControllers\SerieAdminController@delete');

  //Regate Routing
  Route::get('/admin/regate', 'AdminControllers\RegateAdminController@index')->name('regateAdmin');
  Route::post('/admin/regate/update/{regateId}', 'AdminControllers\RegateAdminController@updateRegate')->name('regateAdmin.update');
  Route::get('/admin/regate/addBoat/{boatId}', 'AdminControllers\RegateAdminController@addBoatToRegate')->name('regateAdmin.addBoat');
  Route::get('/admin/regate/addAllBoat', 'AdminControllers\RegateAdminController@addAllBoatsToRegate')->name('regateAdmin.addAllBoat');
  Route::get('/admin/regate/removeBoat/{boatId}', 'AdminControllers\RegateAdminController@removeBoatFromRegate')->name('regateAdmin.removeBoat');
  Route::get('/admin/regate/removeAllBoat', 'AdminControllers\RegateAdminController@removeAllBoatsFromRegate')->name('regateAdmin.removeAllBoat');

});
  Route::post('/admin/regate/setStartTime', 'AdminControllers\RegateAdminController@updateStartTimeRegate')->name('regateAdmin.updateStartTime');
  Route::post('/admin/regate/setEndTime', 'AdminControllers\RegateAdminController@updateEndTimeRegate')->name('regateAdmin.updateEndTime');
