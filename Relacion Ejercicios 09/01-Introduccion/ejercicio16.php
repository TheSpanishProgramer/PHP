<?php

function comparar($numeroA, $numeroB){
    if($numeroA != $numeroB)
        return $numeroA+$numeroB;
    return $numeroA*$numeroB;
}

$numeroA = $_GET["numeroA"];
$numeroB = $_GET["numeroB"];

require "ejercicio16.view.php";


