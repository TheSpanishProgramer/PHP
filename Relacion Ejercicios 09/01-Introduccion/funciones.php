<?php

function esPrimo($numero) {
    if($numero == 1) {
        return false;
    }
    $contador = 0;
    for($i = 2; $i <= $numero; $i++) {
        if($numero%$i == 0) {
            $contador++;
            //Si se puede dividir por algun numero mas de una vez, no es primo.
            if($contador > 1) {
                return false;
            }
        }
    }
    return true;
}