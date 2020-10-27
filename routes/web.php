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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/Admin', 'Admin\AdminController');


Route::resource('users','UserController')->middleware('admin');
Route::resource('permissions','PermissionController')->middleware('admin');
Route::resource('roles','RoleController')->middleware('admin');





Route::group(['prefix'=>'formulaires'],function(){
    Route::group(['middleware' => ['role:admin|Consignataire|CSSMM']], function () {
        Route::post('annonce_navires/import','AnnonceNavireController@import')->name('annonce_navires.import');
        Route::get('annonce_navires/navire/{id}','AnnonceNavireController@navire')->name('annonce_navires.navire');
        Route::get('annonce_navires/createNouveauNavire','AnnonceNavireController@createNouveauNavire')->name('annonce_navires.createNouveauNavire');
//    Route::post('annonce_navires/import_process', 'AnnonceNavireController@processImport')->name('annonce_navires.import_process');
        Route::put('annonce_navires/validatation/{id}','AnnonceNavireController@validatation')->name('annonce_navires.validatation');
        Route::resource('annonce_navires','AnnonceNavireController');
    });
    Route::group(['middleware' => ['role:admin|CSSMM|PCPN|Transitaire']], function () {
        Route::put('poste_quais/validatation/{id}','PosteQuaiController@validatation')->name('poste_quais.validatation');
        Route::get('poste_quais/navire/{id}','PosteQuaiController@navire')->name('poste_quais.navire');
        Route::resource('poste_quais','PosteQuaiController');
    });
    Route::group(['middleware' => ['role:admin|CSTN|Consignataire']], function () {
        Route::put('manifestes/validatation/{id}','ManifesteController@validatation')->name('manifestes.validatation');
        Route::resource('manifestes','ManifesteController');
    });
    Route::group(['middleware' => ['role:admin|CSTN|Transitaire']], function () {
        Route::put('bon_de_commandes/validatation/{id}','BonCommandeController@validatation')->name('bon_de_commandes.validatation');
        Route::resource('bon_de_commandes','BonCommandeController');
    });
    Route::group(['middleware' => ['role:admin|CSP|Transitaire']], function () {
        Route::put('bon_a_delivrers/validatation/{id}','BonDelivrerController@validatation')->name('bon_a_delivrers.validatation');
        Route::resource('bon_a_delivrers','BonDelivrerController');
        Route::put('bon_a_enlevers/validatation/{id}','BonEnleverController@validatation')->name('bon_a_enlevers.validatation');
        Route::resource('bon_a_enlevers','BonEnleverController');
        Route::put('mise_a_quais/validatation/{id}','MiseQuaiController@validatation')->name('mise_a_quais.validatation');
        Route::resource('mise_a_quais','MiseQuaiController');
    });

    Route::put('constat_de_vue_a_quais/validatation/{id}','constatVueQuaisController@validatation')->name('constat_de_vue_a_quais.validatation');
    Route::resource('constat_de_vue_a_quais','constatVueQuaisController');

});

//Route::resource('cpns','CpnController');



Route::resource('test','FormulaireController');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::post('/notification/get', 'NotificationController@get');
Route::post('/notification/read', 'NotificationController@read');
//Route::get('tet', function () {
//    event(new App\Events\StatusLiked('Someone'));
//    return "Event has been sent!";
//});

//Route::get('/markAsRead',function(){
//    auth()->user()->unreadNotifications->markAsRead();
//});
