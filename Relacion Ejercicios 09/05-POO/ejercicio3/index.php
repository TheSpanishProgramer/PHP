<?php

include "Models/Cuadrado.php";
include "Models/Triangulo.php";

$cuadrado1 = new \Ejercicio3\Models\Cuadrado("rojo", 20, 5);

echo "El cuadrado tiene un area de " . $cuadrado1->area() . " metros<br>";

$triangulo1 = new \Ejercicio3\Models\Triangulo("rojo", 12, 10);

echo "El triángulo tiene un area de " . $triangulo1->area() . "metros<br>";
