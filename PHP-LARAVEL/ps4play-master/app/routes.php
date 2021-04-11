<?php

//GET
Route::get('/', array('uses'=>'HomeController@showHome', 'as'=>'home'));
Route::get('/register', 'CustomerController@signUp');
Route::get('/login', 'CustomerController@signIn');
Route::get('/games/{genre}/{slug?}', array('uses'=>'GameController@showGames', 'as'=>'games'));
Route::get('/cart', 'CartController@cart');
Route::get('/review/{id}', array('before'=>'auth', 'uses'=>'ReviewController@review'));
Route::get('/logout', array('before'=>'auth', 'uses'=>'CustomerController@logOutHandler', 'as'=>'logout'));
Route::get('/checkout', array('before'=>'auth', 'uses'=>'CartController@checkOut'));
Route::get('/contact', function(){

	return View::make('pages.contact');
});

//POST
Route::post('/register', 'CustomerController@signUpHandler');
Route::post('/login', 'CustomerController@loginHandler');
Route::post('/check_username', array('uses'=>'CustomerController@checkUsername', 'as'=>'check'));
Route::post('/update_cart', 'CartController@updateCart'); 
Route::post('/review/{id}', array('uses'=>'ReviewController@reviewHandler', 'as'=>'review'));
Route::post('/remove_from_cart', 'CartController@remove');
Route::post('/contact', function(){

	$data = array( 'body' => Input::get('message'), 'name'=>Input::get('name') );
	Mail::send('emails.contact', $data , function($message){

		$message->from( Input::get('email'), Input::get('name') );
		$message->to( 'lordkg@verizon.net' )->subject( Input::get('subject') . " (PS4Play)" );
	});

	return View::make('pages.confirmation', array('confirmationNumber'=>0));
});


