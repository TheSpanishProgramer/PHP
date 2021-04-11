<?php


$notas = [
    "Amaia" => 6.5,
    "Ane" => 7.5,
    "Maite" => 5.2,
    "Lorea" => 9.1,
    "Markel" => 6.8,
    "Urtzi" => 8.4,
];

function generarElemento($nombre, $nota) {
    return "<li>La nota media de {$nombre} es {$nota}</li>";
}

function generarLista($elementos) {
    $listaHTML = "<ul>";
    foreach($elementos as $nombre=>$nota) {
        $listaHTML .= generarElemento($nombre, $nota);
    }
    return $listaHTML."</ul>";
}

require "ejercicio30.view.php";