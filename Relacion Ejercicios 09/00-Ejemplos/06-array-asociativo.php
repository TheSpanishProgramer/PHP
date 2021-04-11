<?php

$usuario = [
    "nombre" => "Jon",
    "apellidos" => "Larrain Ogeta",
    "email" => "jlarrain@php.net"
];
// Acceso a elemento:
$usuario["email"];

// Añadir elemento:
$usuario["edad"] = 30;

// Recorrer todo el array
foreach ($usuario as $clave => $valor) {
    echo $clave;
    echo $valor;
}


