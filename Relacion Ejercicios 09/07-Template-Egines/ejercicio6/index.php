<?php

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;
require "datos.php";

$tienda = "ZAPAPLUS";

// Comprobamos si ha habido alguna acción del usuario
if(isset($_GET["accion"])) {
    // Realizar la acción:
    switch ($_GET["accion"]) {
        case "detalle" :
            echo Blade::render("detalle", [
                "paginaActual" => "Listado de zapatillas",
                "zapatilla" => getById($zapatillas, $_GET["id"])
                ]);
            break;
        case "listado":
            echo Blade::render("listado", [
                "paginaActual" => "Detalle de zapatilla",
                "tienda" => $tienda,"listado_zapatillas" => $zapatillas]);
            break;
    }
} else {
    echo Blade::render("listado", [
        "paginaActual" => "Detalle de zapatilla",
        "tienda" => $tienda,"listado_zapatillas" => $zapatillas]);
}

