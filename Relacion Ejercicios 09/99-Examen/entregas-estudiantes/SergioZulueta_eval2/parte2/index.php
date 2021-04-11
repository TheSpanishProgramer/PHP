<?php
include("funciones.php");
$dbh = connect();


if (isset($_GET["accion"])){
    $accion = $_GET["accion"];
    switch ($accion){
        case 'insertar';
        $data = array(
            "codigo" =>$_GET["codigo"],
            "nombre" =>$_GET["nombre"],
            "apellidos" =>$_GET["apellidos"],
        );
        insertarPaciente($dbh, $data);
        break;

        case 'eliminar';
        eliminarPacientes($dbh);
        break;

        case 'atendido';
        $data = array(
            "id" => $_GET["id"],
        );
        atenderPacientes($dbh, $data);

        break;

    }
}



$items = consulta($dbh);

function tabla($items){
    foreach ($items as $item){
        echo "<tr><td>{$item->codigo}</td>";
        echo "<td>{$item->nombre}</td>";
        echo "<td>{$item->apellidos}</td>";
        echo "<td>{$item->atendido}</td>";
        echo "<td><a href=\"index.php?accion=atendido&id={$item->id}\">Atendido</a></td></tr>";
    }
}


include("parte2.php");