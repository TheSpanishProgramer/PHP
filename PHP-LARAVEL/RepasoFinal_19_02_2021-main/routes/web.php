<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LibroController, TemaController};

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//-----------------------------
Route::resource('temas', TemaController::class);
Route::resource('libros', LibroController::class);
//Rourte::resource('nombre), Controlador::class)

//ruta para ver libros por temática
//Route::get('libros/{tema}/librosxtema', '\App\Http\Controllers\LibroController::class@verLibrosTema')
Route::get('libros/{id}/librosxtema', [LibroController::class, 'verLibrosTema'])
->middleware(['auth', 'verified'])->name('librosxtema');

require __DIR__.'/auth.php';
