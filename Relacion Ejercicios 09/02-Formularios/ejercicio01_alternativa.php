<?php

function convertirTemperatura($temperatura, $unidad) {
    if($unidad == 'celsius') {
        return round(1.8 * $temperatura + 32, 2);
    } else {
        return round(($temperatura - 32) / 1.8, 2);
    }
}

// Si el usuario ha enviado los datos, calculamos el resultado y lo dejamos disponible en la variable $resultado.
if (isset($_GET["temperatura"]) && $_GET["temperatura"]!= '' && isset($_GET["unidad"])) {
    $temperatura = $_GET["temperatura"];
    $unidad = $_GET["unidad"];
    $resultado = convertirTemperatura(intval($temperatura), $unidad);
}
require "ejercicio01index_alternativa.view.php";
