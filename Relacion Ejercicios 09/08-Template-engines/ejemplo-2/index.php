<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;

use Egibide\Models\Persona;

$listado_personas = array();
$persona1 = new Persona("Ane Larrain", "UX Designer", 32);
$persona2 = new Persona("Mikel Ubierna", "Fullstack dev", 25);
$persona3 = new Persona("Unai Arbizu", "Senior programmer", 46);
array_push($listado_personas, $persona1);
array_push($listado_personas, $persona2);
array_push($listado_personas, $persona3);

echo Blade::render("welcome", [
    "personas" => $listado_personas
]);
