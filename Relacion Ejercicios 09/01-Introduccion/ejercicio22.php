<?php

$paises = ["Brasil", "Portugal", "Islandia", "Mexico", "Filipinas", "Marruecos"];

function encontrarPosicion($paises, $pais) {

    for($x = 0; $x < count($paises); $x++) {
        if($paises[$x] == $pais) {
            return $x;
        }
    }
    return -1;
}

require "ejercicio22.view.php";