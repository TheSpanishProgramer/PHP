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

Route::post('/reset/socialName', 'UpdateResetPassController@updatePassword')->name('update.socialname');

// es un helper de las rutas de autentificacion
Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'superadmin', 'middleware' => ['web', 'auth', 'authRole'], 'roles' => 'superadmin'], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('certificationQuestions', 'CertificationQuestionController');
    Route::resource('certificationQuestionAnswers', 'CertificationQuestionAnswerController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'authRole'], 'roles' => ['superadmin','admin']], function () {
    Route::resource('gTAAccounts', 'GTAAccountController');
});

Route::group(['prefix' => 'certificador', 'middleware' => ['web', 'auth', 'authRole'], 'roles' => ['superadmin','admin','certificador']], function () {
    Route::resource('userCertifications', 'UserCertificationController');
});

Route::group(['prefix' => 'general', 'middleware' => ['web', 'auth', 'authRole'], 'roles' => ['superadmin','admin','certificador','user']], function () {
    Route::get('pcu', 'PCUController@index')->name('pcu.index');
    Route::get('pcu/test', 'PCUController@getPCUTest')->name('pcu.test');
    Route::post('pcu/test', 'PCUController@postPCUTest')->name('pcu.validation');
    Route::post('pcu/character', 'PCUController@postUserCertification')->name('pcu.character');
});

