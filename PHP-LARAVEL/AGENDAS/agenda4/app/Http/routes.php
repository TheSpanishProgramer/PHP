<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/calendar/{calendar}', 'CalendarController@index');
Route::post('/calendar/add', 'CalendarController@add');
Route::get('/calendar/delete/{calendar}', 'CalendarController@delete');
Route::get('/calendar/edit/{calendar}', 'CalendarController@edit');
Route::patch('/calendar/{calendar}/update', 'CalendarController@update');

Route::get('/event/{event}', 'EventsController@index');
Route::post('/event/add', 'EventsController@add');
Route::get('/event/edit/{event}', 'EventsController@edit');
Route::patch('/event/{event}/update', 'EventsController@update');
Route::get('/event/delete/{event}', 'EventsController@delete');

Route::post('/comment/add', 'CommentController@add');
Route::get('/comment/edit/{comment}', 'CommentController@edit');
Route::patch('/comment/{comment}/update', 'CommentController@update');
Route::get('/comment/delete/{comment}', 'CommentController@delete');

Route::get('/user', 'UsersController@index');
Route::post('/user/add', 'UsersController@add');
Route::get('/user/delete/{user}', 'UsersController@delete');
Route::get('/user/edit/{user}', 'UsersController@edit');
Route::patch('/user/update/{user}', 'UsersController@update');
Route::get('/user/permission/{user}', 'UsersController@permission');
Route::post('/user/permission_set/{user}', 'UsersController@permission_set');
