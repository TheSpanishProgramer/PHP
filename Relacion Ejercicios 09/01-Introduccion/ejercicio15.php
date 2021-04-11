<?php

$diccionario = [
    "user1" => [
        "nombre" => "Jon",
        "apellidos" => "Larrain Ogeta",
        "email" => "jlarrain@php.net"
    ],
    "user2" => [
        "nombre" => "Amaia",
        "apellidos" => "Arbizu Urarte",
        "email" => "aarbizu@php.net"
    ],
    "user3" => [
        "nombre" => "Markel",
        "apellidos" => "Abarra Ondarreta",
        "email" => "mabarra@php.net"
    ]
];


function getDatos($diccionario, $usuario, $tipoDato) {
    return $diccionario[$usuario][$tipoDato];
}

require "ejercicio15.view.php";