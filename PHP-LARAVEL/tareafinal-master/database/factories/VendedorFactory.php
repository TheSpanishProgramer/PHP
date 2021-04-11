<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vendedor;
use Faker\Factory;
$faker=Factory::create('es_ES');

$factory->define(Vendedor::class, function ( $faker) {
    return [
        'nombre'=>$faker->firstName($gender='male'| 'female'),
        'apellido'=>$faker->lastName(),
        'direccion'=>$faker->address,
        'telefono'=>$faker->e164PhoneNumber,
        //el 60% se asignará un email y un 40% será null
        'mail'=>$faker->unique()->safeEmail
        
    ];
});
