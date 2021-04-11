<?php

/*** FUNCIONES ***/
function realizarOperacion($operacion, $numero1, $numero2) {
    switch ($operacion) {
        case "suma":
            return $numero1+$numero2;
        case "resta":
            return $numero1-$numero2;
        case "multiplicacion":
            return $numero1*$numero2;
        case "division":
            if($numero2 != 0) {
                return $numero1/$numero2;
            } else {
                return "No es posible dividir entre cero";
            }
        default:
            return "Ha habido un error. Por favor, asegúrese de que introduce una operación válida.";
    }
}

// Si recibimos una operación, cargamos el resultado. Si no cargamos el formulario vacío.
if (isset($_GET["numero1"]) && isset($_GET["numero2"]) && isset($_GET["operacion"])) {
    $resultado = realizarOperacion($_GET["operacion"], intval($_GET["numero1"]), intval($_GET["numero2"]));
    require "ejercicio02resultado.view.php";
} else {
    require "ejercicio02index.view.php";
}