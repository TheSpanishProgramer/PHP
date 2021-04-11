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

Route::get('/', 'HomeController@index');

Route::get('/catalog', 'CatalogController@getIndex');

Route::group(['middleware' => 'auth'], function() 
{
    Route::get('/catalog/show/{id}', 'CatalogController@getShow');
    Route::get('/catalog/create', 'CatalogController@getCreate');
    Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');
    Route::post('/catalog/create', 'CatalogController@postCreate');
    Route::put('/catalog/edit/{id}', 'CatalogController@putEdit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



/*
// Para proteger una clausula:
Route::get('admin/catalog', function(){
    // Solo se permite el acceso a usuarios autenticados
})->middleware('auth');
// Para proteger una acción de un controlador:
Route::get('profile', 'ProfileController@show')->middleware('auth');

Route::get('/catalog/show/{id}', 'CatalogController@getShow')->middleware('auth');

Route::get('/catalog/create', 'CatalogController@getCreate')->middleware('auth');

Route::get('/catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');

*/

