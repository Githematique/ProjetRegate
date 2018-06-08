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

  Route::get('/admin/resultats', 'AdminControllers\ResultatsAdminController@index')->name('resultats');

  //Boats Routing
  Route::get('/admin/boat', 'AdminControllers\BoatAdminController@index')->name('adminBoat');
  Route::get('/admin/boat/add', 'AdminControllers\BoatAdminController@addBoatView')->name('adminBoat.add');
  Route::get('/admin/boat/update/{boatId}', 'AdminControllers\BoatAdminController@getBoat')->name('adminBoat.update');
  Route::post('/admin/boat/update/{boatId}', 'AdminControllers\BoatAdminController@updateBoat');
  Route::post('/admin/boat/add', 'AdminControllers\BoatAdminController@store');



});
