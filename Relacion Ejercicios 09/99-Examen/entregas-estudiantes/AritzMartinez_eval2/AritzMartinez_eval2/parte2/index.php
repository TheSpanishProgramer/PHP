<?php

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
require_once "db_function.php";

$conn = connect();

if(isset($_GET['accion'])){

    $accion = $_GET['accion'];
    switch ($accion){
        case 'insert':
            $cod = $_GET['codigo'];
            $nom = $_GET['nombre'];
            $ape = $_GET['apellidos'];
            $aten = $_GET['atendido'];
            insertPaciente($conn,$cod,$nom,$ape,$aten);
            break;
        case 'update':
            $nom = $_GET['nombre'];
            updatePaciente($conn,$nom);
            break;
        case 'borrar':
            $cod = $_GET['codigo'];
            deletePaciente($conn,$cod);
            break;

    }

}



$items = select($conn);

require "indexPrincipal.php";

?>
