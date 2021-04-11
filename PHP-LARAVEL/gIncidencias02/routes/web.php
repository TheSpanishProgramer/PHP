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

Route::get('/reportar', 'HomeController@getreport');
Route::post('/reportar', 'HomeController@postreport');

// Este grupo de rutas estará protegido por un middleware 'Auth', el cuál solo permite el acceso a usuarios que esten loggeados y también se indica que el
// namespace de los controlladores es dentro de la carpeta Admin.
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function() {

	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');
	Route::get('/usuario/{id}', 'UserController@edit');
	Route::post('/usuario/{id}', 'UserController@update');
	Route::get('/usuario/{id}/eliminar', 'UserController@delete');	

	Route::get('/proyectos', 'ProjectController@index');
	Route::get('/config', 'ConfigController@index');
});