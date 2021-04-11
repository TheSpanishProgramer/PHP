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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('vendedores/{vendedore}/venta', 'VendedorController@formVentas')->name('vendedores.formVentas');
// Route::get('/', "ArticuloController@index"); Esto hace que la ruta raiz llame al metodo index del controlador Articulo
Route::resource('articulos', 'ArticuloController');
Route::resource('categorias', 'CategoriaController');
Route::resource('vendedores', 'VendedorController');

Route::post('vendedor', 'VendedorController@venta')->name('vendedores.venta');
