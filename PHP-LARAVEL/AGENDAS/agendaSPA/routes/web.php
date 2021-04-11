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
    return view('auth.login');
});
Auth::routes();

Route::group(['prefix' => 'admin'], function(){
	Route::resource('sedes','SedesController');
	Route::get('sedes/{id}/destroy',[
		'uses' => 'SedesController@destroy',
		'as' => 'sedes.destroy'
	]);
	Route::resource('servicios','ServiciosController');
	Route::get('servicios/{id}/destroy',[
		'uses' => 'ServiciosController@destroy',
		'as' => 'servicios.destroy'
	]);
	Route::get('users/digitadores',[
		'uses' => 'UsersController@digitadores',
		'as' => 'users.digitadores'
	]);
	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses' => 'UsersController@destroy',
		'as' => 'users.destroy'
	]);
	Route::get('profesionals/asignar',[
		'uses' => 'ProfesionalController@asignar',
		'as' => 'profesionals.asignar'
	]);
	Route::resource('profesionals','ProfesionalController');
	Route::get('profesionals/{id}/destroy',[
		'uses' => 'ProfesionalController@destroy',
		'as' => 'profesionals.destroy'
	]);
	//Creacion de la ruta para recibir al peticion AJAX del registro del cliente del modulo clientes
	Route::post('clientes/storeajax',[
		'uses' => 'ClientesController@store_ajax',
		'as' => 'clientes.storeajax'
	]);
	Route::resource('clientes','ClientesController');
	Route::get('clientes/{id}/destroy',[
		'uses' => 'ClientesController@destroy',
		'as' => 'clientes.destroy'
	]);
	Route::resource('turnos','TurnosController');
	Route::get('turnos/{id}/destroy',[
		'uses' => 'TurnosController@destroy',
		'as' => 'turnos.destroy'
	]);
	//Rutas creadas para las consultas AJAX del modulo de citas
	Route::Get('citas/byservicio/{id}',[
		'uses' => 'CitasController@byServicio',
		'as' => 'citas.byServicio'
	]);
	Route::Get('citas/byprofesional/{servicio}/{sede}',[
		'uses' => 'CitasController@byprofesional',
		'as' => 'citas.byprofesional'
	]);
	Route::Get('citas/calendarcitas',[
		'uses' => 'CitasController@calendarcitas',
		'as' => 'citas.calendarcitas'
	]);
	Route::post('citas/clientes',[
		'uses' => 'CitasController@clientes',
		'as' => 'citas.clientes'
	]);	
	Route::get('citas/disponibilidad/{profesional_id}/{reservadate}/{reservatime}',[
		'uses' => 'CitasController@disponibilidad',
		'as' => 'citas.diponibilidad'
	]);
	Route::Get('citas/{id}/destroy',[
		'uses' => 'CitasController@destroy',
		'as' => 'citas.destroy'
	]);
	//como pasamos la variable correspondiente al id de la categoría como parámetro en la url en la ruta lo recibimos como parámetro
	Route::resource('citas','CitasController');
	/*----RUTAS DEFINIDA PARA LOS REPORTES ----*/
	Route::get('reportes',[
		'uses' => 'ReportesController@index',
		'as' => 'reportes.index'
	]);
	Route::get('reportes/general/{sede}',[
		'uses' => 'ReportesController@general',
		'as' => 'reportes.general'
	]);
});
Route::get('/home', 'HomeController@index')->name('home');
