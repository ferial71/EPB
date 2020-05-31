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
//Route::get('/annonce_navire', 'HomeController@annonce_navire')->name('annonce_navire');
Route::get('/dpostequai', 'HomeController@dpostequai')->name('dpostequai');
//Route::get('/Consignataire/annonce_navire', 'ConsignataireController@index')->name('annonce');
Route::resource('/Consignataire', 'ConsignataireController');
Route::resource('/Transitaire', 'transitaire\TransitaireController');
Route::resource('/Admin', 'Admin\AdminController');

//Route::resource('/Consignataire/annonce_navire', 'consignataire\annonce_navireController');


Route::resource('users','UserController')->middleware('admin');
Route::resource('permissions','PermissionController');
Route::resource('roles','RoleController');





Route::group(['prefix'=>'formulaires'],function(){
    Route::resource('annonce_navires','AnnonceNavireController');
    Route::put('poste_quais/validatation/{id}','PosteQuaiController@validatation')->name('validatation');
    Route::resource('poste_quais','PosteQuaiController');
    Route::resource('manifestes','ManifesteController');
    Route::resource('bon_de_commandes','BonCommandeController');
    Route::resource('bon_a_delivrers','BonDelivrerController');
    Route::resource('bon_a_enlevers','BonEnleverController');
    Route::resource('mise_a_quais','MiseQuaiController');

});





Route::resource('test','FormulaireController');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

