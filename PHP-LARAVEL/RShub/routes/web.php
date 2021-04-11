<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Games
Route::get('/games', 'GamesController@index');
Route::get('/games/add-game', 'GamesController@add');
Route::post('/games/add-game', 'GamesController@store');
Route::get('/games/{game}', 'GamesController@show');

//Stories
Route::get('/games/{game}/create-story', 'StoriesController@create');
Route::post('/games/create-story', 'StoriesController@store');
Route::get('/games/edit-story/{id}', 'StoriesController@edit');
Route::patch('/games/edit-story/{id}', 'StoriesController@update');
Route::delete('/games/edit-story/{id}', 'StoriesController@delete');

//Reviews
Route::get('/games/{game}/create-review', 'ReviewsController@create');
Route::post('/games/create-review', 'ReviewsController@store');
Route::get('/games/edit-review/{id}', 'ReviewsController@edit');
Route::patch('/games/edit-review/{id}', 'ReviewsController@update');
Route::delete('/games/edit-review/{id}', 'ReviewsController@delete');

//Users
Route::get('/user/{id}', 'UsersController@show');
Route::get('/user/{id}/edit', 'UsersController@edit');
Route::patch('/user/{id}/edit', 'UsersController@update');
Route::delete('/user/{id}/edit', 'UsersController@delete');

//Admin
Route::get('/admin', 'AdminsController@index');

