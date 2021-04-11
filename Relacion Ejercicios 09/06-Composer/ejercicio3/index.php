<?php

require_once 'vendor/autoload.php';

use Ejercicio3\Models\RegularUser;
use Ejercicio3\Models\Admin;


$administradores = array();
$usuarios = array();

// Creamos una instancia de Faker para generar los valores que necesitaremos enviar al constructor
$faker = Faker\Factory::create();
// Creamos los usuarios Admin:
for($i = 0; $i < 5; $i++) {
   array_push(
       $administradores,
       new Admin($faker->userName, $faker->name, $faker->lastName, $faker->email, $faker->password, $faker->dateTime, $faker->numberBetween(1,3))
   );
}
// Creamos los usuarios RegularUser
for($i = 0; $i < 5; $i++) {
    array_push(
        $usuarios,
        new RegularUser($faker->userName, $faker->name, $faker->lastName, $faker->email, $faker->password, $faker->dateTime, $faker->company, $faker->city)
    );
}

// Ejecutamos varios métodos en los objetos creados para ver que el log se escribe bien:
echo $administradores[0]->getNombre() . "<br>";
$administradores[0]->desactivarUsuario() . "<br>";
echo $administradores[0]->getUltimoAcceso()->format('Y-m-d H:i:s') . "<br>";
$administradores[0]->login() . "<br>";
echo $usuarios[0]->getNombre() . "<br>";
$usuarios[0]->editarPerfil() . "<br>";
echo $usuarios[0]->getUltimoAcceso()->format('Y-m-d H:i:s') . "<br>";
$usuarios[0]->showActions() . "<br>";
