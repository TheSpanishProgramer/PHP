<?php

$marcas = ["Audi", "Seat", "Mercedes", "Volskwagen", "BMW", "Fiat"];

function generarElemento($elemento) {
    return "<li>$elemento</li>";
}

function generarListado($elementos) {
    $lista = "<ul>";
    $index = 0;
    do {
        $lista .= generarElemento($elementos[$index]);
        $index++;
    } while($index<count($elementos));
    return $lista."</ul>";
}

require "ejercicio26.view.php";