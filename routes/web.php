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

  //Routes
  Route::get('/', 'AdminControllers\AdminController@index')->name('accueil');
  Route::get('/admin/boat', 'AdminControllers\BoatAdminController@index')->name('adminBoat');
  Route::get('/admin/resultats', 'AdminControllers\ResultatsAdminController@index')->name('resultats');

  //Routes that interact with the DB
  Route::post('/admin/addBoat', 'AdminControllers\BoatAdminController@store');

});
