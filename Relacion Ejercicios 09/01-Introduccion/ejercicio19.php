<?php

function sumar($numero) {
    $resultado = 0;
    for($i=0; $i<=$numero; $i++) {
        $resultado+=$i;
    }
    return $resultado;
}

require "ejercicio19.view.php";