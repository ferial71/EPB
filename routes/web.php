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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/annoncenav', 'HomeController@annoncenav')->name('annoncenav');
Route::get('/dpostequai', 'HomeController@dpostequai')->name('dpostequai');
//Route::get('/Consignataire/AnnonceNav', 'ConsignataireController@index')->name('annonce');
Route::resource('/Consignataire', 'ConsignataireController');
Route::resource('/Transitaire', 'transitaire\TransitaireController');
Route::resource('/Admin', 'Admin\AdminController');

//Route::resource('/Consignataire/annonceNav', 'consignataire\AnnonceNavController');

Route::resource('annonceNav','AnnonceNavController');
Route::resource('users','UserController')->middleware('admin');
Route::resource('permissions','PermissionController');
Route::resource('roles','RoleController');
Route::resource('poste_quais','Poste_quaiController');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});

