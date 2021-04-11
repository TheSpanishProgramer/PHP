<?php

$marcas = ["ACDC", "Platero y tu", "Berri Txarrak", "Bob Marley $ The Wailers", "Foo Fighters", "Muse", "Sutagar", "Kortatu"];

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

require "ejercicio27.view.php";