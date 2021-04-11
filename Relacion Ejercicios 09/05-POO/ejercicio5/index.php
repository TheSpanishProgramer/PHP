<?php

require "Models/Persona.php";
use Ejercicio5\Models\Persona;

echo "Total de personas en el mundo: " . Persona::$personasEnElMundo . "<br>";

$persona1 = new Persona();
$persona2 = new Persona();
$persona3 = new Persona();
$persona4 = new Persona();
$persona5 = new Persona();

echo "Total de personas en el mundo: " . Persona::$personasEnElMundo . "<br>";
echo "Total de personas en el mundo: " . $persona3->getPersonasEnElMundo() . "<br>";