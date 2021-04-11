<?php
require __DIR__ . '/vendor/autoload.php';
require "Models/Paciente.php";
use Ejercicio2\Models\Paciente;

// Comprobamos si ha habido alguna acción del usuario
if(isset($_GET["accion"])) {
    // Realizar la acción:
    realizarAccion($_GET["accion"]);
}

function realizarAccion($accion){
    $paciente = new Paciente("Ane", "Urbia",22);
    switch ($accion) {
        case "enfermar" :
            $paciente->enfermar();
            break;
        case "curar":
            $paciente->curar();
            break;
    }
}

echo "<a href='index.php?accion=enfermar'>Voy a enfermar</a> | ";
echo "<a href='index.php?accion=curar'>Me voy a curar</a>";