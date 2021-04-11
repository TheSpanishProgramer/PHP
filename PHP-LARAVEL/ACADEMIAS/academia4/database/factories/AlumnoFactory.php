<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alumno;
//use Faker\Generator as Faker;
//para cargar en castellano
$faker=Faker\Factory::create('es_ES');
//borramos la clase Faker en la funcion anonima
$factory->define(Alumno::class, function ( $faker) {
    return [
        'nombre'=>$faker->name,
        'apellido'=>$faker->lastName,
        'email'=>$faker->unique()->safeEmail,
        'direccion'=>$faker->address,
        'telefono'=>$faker->e164PhoneNumber
    ];
});
