<?php

$estudiantes = ["Ane", "Markel", "Nora", "Danel", "Amaia", "Izaro"];

function generarElemento($elemento) {
    return "<li>$elemento</li>";
}

function generarListado($elementos) {
    $lista = "<ul>";
    for($i=0; $i<count($elementos); $i++) {
        $lista .= generarElemento($elementos[$i]);
    }
    return $lista."</ul>";
}

require "ejercicio23.view.php";