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
  // Route::get('/', 'LoginController@index')->name('login');
  Route::get('/', 'AdminControllers\AdminController@index')->name('accueil');
  Route::get('/admin/boat', 'AdminControllers\BoatAdminController@index')->name('accueil');
});
