<?php

$usuarios = [
    "user1" => [
        "nombre" => "Nora",
        "password" => "123123",
        "email" => "nora@php.net"
    ],
    "user2" => [
        "nombre" => "Irati",
        "password" => "abcabc",
        "email" => "irati@php.net"
    ]
];

function login($usuario, $password, $usuarios){
    if(!array_key_exists($usuario, $usuarios)) {
        return "El usuario no existe";
    } elseif ($password != $usuarios[$usuario]["password"]){
        return "Contraseña incorrecta";
    }
    return "Login correcto";
}

$usuario = $_GET["usuario"];
$password = $_GET["password"];

require "ejercicio17.view.php";


