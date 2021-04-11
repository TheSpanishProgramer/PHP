<?php

$estudiantes = ["Ane", "Markel", "Nora", "Danel", "Amaia", "Izaro"];

function generarElemento($elemento) {
    return "<li>$elemento</li>";
}

function generarListado($elementos) {
    $lista = "<ul>";
    $index = 0;
    while($index<count($elementos)) {
        $lista .= generarElemento($elementos[$index]);
        $index++;
    }
    return $lista."</ul>";
}

require "ejercicio25.view.php";