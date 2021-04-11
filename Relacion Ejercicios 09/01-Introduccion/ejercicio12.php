<?php
function getValor($array, $posicion) {
    return $array[$posicion];
}

function setValor($varrayValores, $posicion, $valor) {
    $varrayValores[$posicion] = $valor;
    return $varrayValores;
}

$valores = array('Paris','Berlin','Amsterdam','Praga');
$primerElemento = getValor($valores,0);
$segundoElemento = getValor($valores,1);
$valores = setValor($valores,1,"Vitoria");

require "ejercicio12.view.php";