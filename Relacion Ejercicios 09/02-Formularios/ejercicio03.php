<?php

function crearArrayNumeros($tamaño = 20){
    $listadoNumeros = [];
    for($i = 0; $i<$tamaño; $i++) {
        $listadoNumeros[$i] = random_int(1,10);
    }
    return $listadoNumeros;
}

function contarAparicionesEnArray($listadoNumeros, $numero){
    $contador = 0;
    foreach($listadoNumeros as $num) {
        if($num == $numero) {
            $contador++;
        }
    }
    return $contador;
}

/**
 * Comprobar si ya hemos creado el array de números anteriormente.
 * Si es así, asignamos el valor a la variable $listadoNumeros y contamos
 * la cantidad de veces que aparece el número enviado en el array.
 */
if(isset($_GET["numeros"])) {
    $listadoNumeros = explode(",", $_GET["numeros"]);
    $apariciones = contarAparicionesEnArray($listadoNumeros, intval($_GET["numero"]));
} else {
    $listadoNumeros = crearArrayNumeros();
}
require "ejercicio03index.view.php";