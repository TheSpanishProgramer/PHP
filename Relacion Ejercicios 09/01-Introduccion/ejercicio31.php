<?php

// Le pasamos el tamaño como argumento para que sea una función más reutilizable.
function generarArrayNumerosAleatorios($tamaño = 20){
    $numeros = [];
    for($i = 0; $i < $tamaño; $i++) {
        $numeros[$i] = random_int(1,999);
    }
    return $numeros;
}

function valorMasAlto($numeros) {
    $valor = $numeros[0];
    foreach ($numeros as $numero) {
        if($numero > $valor) {
            $valor = $numero;
        }
    }
    return $valor;
}

function valorMasBajo($numeros) {
    $valor = $numeros[0];
    foreach ($numeros as $numero) {
        if($numero < $valor) {
            $valor = $numero;
        }
    }
    return $valor;
}

$numeros = generarArrayNumerosAleatorios(20);

require "ejercicio31.view.php";