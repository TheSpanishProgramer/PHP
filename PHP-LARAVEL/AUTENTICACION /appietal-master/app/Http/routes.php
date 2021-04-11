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
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/password/reset', function () {
    return view('auth.password');
});


Route::get('/', function () {
    return view('home');
});

// crear usuario

Route::get('/crear-usuario/',[
'uses'	=>'MatriculaController@create_user',
'as'	  =>'user.create'
]);

Route::post('/crear-usaurio/',[
'uses'	=>'MatriculaController@store_user',
'as'	  =>'user.store'
]);

Route::get('login',[
'uses'	=>'Auth\AuthController@getLogin',
'as'	=>'login'
]);

Route::post('login', 'Auth\AuthController@postLogin');

/// registrados..
Route::group(['middleware'=>'auth'], function(){

  Route::get('cerrar-sesión', [
  'uses'	=>'Auth\AuthController@getLogout',
  'as'	=>'cerrar'
  ]);

  Route::group(['middleware'=>'role:estudiante'], function()
  {
    Route::get('/mi_certificado',[//ver pdf de cada projecto
    'uses'	=>'MatriculaController@mi_certificado',
    'as'	=>'aspirante.mi_certificado'
    ]);
    Route::get('home', function () {
        return view('welcome');
    });

    // /Estudiantesb - datos personales

    Route::get('/iniciar-proceso/',[
    'uses'	=>'MatriculaController@create_datos',
    'as'	  =>'datos.create'
    ]);

    Route::post('/iniciar-proceso/',[
    'uses'	=>'MatriculaController@store_datos',
    'as'	  =>'datos.store'
    ]);

    // Estudiantesb - datos acudientes

    Route::get('/ingresar-acudientes/',[
    'uses'	=>'MatriculaController@create_acudientes',
    'as'	  =>'acudientes.create'
    ]);

    Route::post('/ingresar-acudientes/',[
    'uses'	=>'MatriculaController@store_acudientes',
    'as'	  =>'acudientes.store'
    ]);

    // Estudiantesb - datos acudientes

    Route::get('/ingresar-institucion/',[
    'uses'	=>'MatriculaController@create_institucions',
    'as'	  =>'institucions.create'
    ]);

    Route::post('/ingresar-institucion/',[
    'uses'	=>'MatriculaController@store_institucions',
    'as'	  =>'institucions.store'
    ]);


    //

    Route::get('verificar-estado', function () {
        return view('estudiantes.estado');
    });

    Route::group(['middleware'=>'role:admin'], function()
    {
      Route::get('listAprobados',[//listado de los proyectos de los develper
      'uses'	=>'MatriculaController@listAprobados',
      'as'	  =>'list.aprobados'
      ]);

      Route::get('listNoAprobados',[//listado de los proyectos de los develper
      'uses'	=>'MatriculaController@listNoAprobados',
      'as'	  =>'list.noaprobados'
      ]);
      Route::get('listPendientes',[//listado de los proyectos de los develper
      'uses'	=>'MatriculaController@listPendientes',
      'as'	  =>'list.pendiente'
      ]);
      Route::get('listAspirantes',[//listado de los proyectos de los develper
      'uses'	=>'MatriculaController@listAspirantes',
      'as'	  =>'list.aspirantes'
      ]);

      Route::get('/editar-datos-aspirante/{id}',[
      'uses'	=>'MatriculaController@edit_datos',
      'as'  	=>'datos.edit'
      ]);

      Route::patch('/editar-datos-aspirante/{id}',[//falta desarrollar
      'uses'	=>'MatriculaController@update_datos',
      'as'  	=>'admin.datos.update'
      ]);

      Route::get('/pdf_aspirante/{id}',[//ver pdf de cada projecto
      'uses'	=>'MatriculaController@mi_pdf',
      'as'	=>'admin.aspirante.mi_pdf'
      ]);
      //
      //
      // Route::get('/editar-datos-aspirante/{id}',[
      // 'uses'	=>'MatriculaController@edit_acudiente',
      // 'as'  	=>'admin.acudiente.edit'
      // ]);

      // Route::patch('/editar-acudiente-aspirante/{id}',[
      // 'uses'	=>'MatriculaController@update_acudiente',
      // 'as'  	=>'admin.acudiente.update'
      // ]);
      //
      //
      // Route::get('/editar-institucion-aspirante/{id}',[
      // 'uses'	=>'MatriculaController@edit_institucion',
      // 'as'  	=>'admin.institucion.edit'
      // ]);

      // Route::patch('/editar-institucion-aspirante/{id}',[
      // 'uses'	=>'MatriculaController@update_institucion',
      // 'as'  	=>'admin.institucion.update'
      // ]);

    });

 });
});
