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
    return view('index');
})->name('index');

Route::get('vendedors/fventas', 'VendedorController@fventas')->name('vendedors.fventas');
Route::get('vendedors/rventas', 'VendedorController@rventas')->name('vendedors.rventas');


Route::resource('categorias', 'CategoriaController');
Route::resource('articulos', 'ArticuloController');
Route::resource('vendedors', 'VendedorController');
//las rutas POST se ponen al final
Route::post('vendedors1','VendedorController@vender')->name('vendedors.vender');