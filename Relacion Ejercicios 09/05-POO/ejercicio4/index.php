<?php

include "Models/Cuadrado.php";
include "Models/Triangulo.php";

$poligonos = [
    new \Ejercicio4\Models\Cuadrado("rojo", 20, 5),
    new \Ejercicio4\Models\Cuadrado("azul", 20, 5),
    new \Ejercicio4\Models\Cuadrado("rojo", 20, 5),
    new \Ejercicio4\Models\Triangulo("verde", 12, 10),
    new \Ejercicio4\Models\Triangulo("rojo", 12, 10),
    new \Ejercicio4\Models\Triangulo("azul", 12, 10)
];

$cantidadRojos = 0;

// No da error si dentro del array hay clases que no son hijas de Poligono pero tienen método getColor().
// Aún así, es más correcto realizar clases abstractas.
foreach ($poligonos as $poligono) {
    if($poligono->getColor() == "rojo") {
        $cantidadRojos++;
    }
}

echo "Hay un total de $cantidadRojos poligonos rojos";
