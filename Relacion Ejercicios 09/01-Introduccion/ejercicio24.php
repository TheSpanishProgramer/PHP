<?php

$agenda = [
    ["nombre" => "Amaia", "apellidos"=>"Gorbea Jainaga", "telefono"=>"945111111", "email"=>"agorbea@php.net"],
    ["nombre" => "Ane", "apellidos"=>"Larrain Ogueta", "telefono"=>"945222222", "email"=>"alarrain@php.net"],
    ["nombre" => "Maite", "apellidos"=>"Murgiondo Lekue", "telefono"=>"945333333", "email"=>"mmurgiondo@php.net"],
    ["nombre" => "Lorea", "apellidos"=>"Aranceta Otxoa", "telefono"=>"945444444", "email"=>"laranceta@php.net"],
    ["nombre" => "Markel", "apellidos"=>"Gurrutxaga Abarra", "telefono"=>"945555555", "email"=>"mgurrutxaga@php.net"],
    ["nombre" => "Urtzi", "apellidos"=>"Iriondo Baiona", "telefono"=>"945666666", "email"=>"uiriondo@php.net"]
];

function generarFila($nombre, $apellidos, $telefono, $email) {
    return "<tr><td>$nombre</td><td>$apellidos</td><td>$telefono</td><td>$email</td></tr>";
}

function generarTabla($elementos) {
    $tablaHTML = "<table border='1'>";
    for($i=0; $i<count($elementos); $i++) {
        $tablaHTML .= generarFila(
            $elementos[$i]["nombre"],
            $elementos[$i]["apellidos"],
            $elementos[$i]["telefono"],
            $elementos[$i]["email"]);
    }
    return $tablaHTML."</table>";
}

require "ejercicio24.view.php";