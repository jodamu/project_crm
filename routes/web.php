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
Route::resource('pais', 'PaisController');
Route::resource('estado', 'EstadoController');
Route::resource('ciudad', 'CiudadController');
Route::post('pais/buscar', 'PaisController@buscar')->name('buscarpais');
Route::resource('cargos', 'CargoController');
Route::resource('sector','SectorController');
Route::resource('estadoscivil','EstadosCivilController');
Route::resource('contacto','ContactoController');
Route::resource('empresa','EmpresaController');
Route::resource('negociacion','NegociacionController');
Route::resource('panel','PanelController');
Route::resource('tablero','TableroController');
Route::get('evento/load','EventoController@load');
Route::match(['get', 'post'],'evento/drop','EventoController@drop')->name('drop');

Route::resource('evento','EventoController');
Route::resource('user','UserController');

Route::resource('tipo','TipoController');
Route::resource('tiponegociacion','TiponegociacionController');
Route::resource('producto','ProductoController');

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tablerouser', 'TableroUsuarioController');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::group(['middleware' => ['cors']], function () {
    
Route::match(['get', 'post'],'negociacion/cambio','NegociacionController@cambio')->name('cambiar');
 

});
