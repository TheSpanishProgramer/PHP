<?php

function esPar($numero){
    if($numero%2 == 0)
        return true;
    return false;
}
function sumar($numero) {
    $resultado = 0;
    for($i=0; $i<=$numero; $i++) {
        if(!esPar($i)) continue;
        $resultado+=$i;
        /* Alternativa:
        if(esPar($i))
            $resultado+=$i;
        */
    }
    return $resultado;
}

require "ejercicio20.view.php";