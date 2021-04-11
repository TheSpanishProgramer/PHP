<?php

$marcas = ["Audi", "Seat", "Mercedes", "Volskwagen", "BMW", "Fiat"];

function generarElemento($elemento) {
    return "<li>$elemento</li>";
}

function generarListado($elementos) {
    $lista = "<ul>";
    foreach ($elementos as $elemento){
        $lista .= generarElemento($elemento);
    }
    return $lista."</ul>";
}

require "ejercicio28.view.php";