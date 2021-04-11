<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::resource('articles', '\App\Http\Controllers\ArticleController');

//Rutas para el formulario de contacto 'App\Http\Controllers\ContactoController@create'

Route::get('contact', [ContactoController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('contact.create');

Route::post('contact', [ContactoController::class, 'send'])
    ->middleware(['auth', 'verified'])->name('contact.send');
