<?php

session_start();

function inicializarListaPacientes(){
    if(!isset($_SESSION["listaPacientes"])){
        $_SESSION["listaPacientes"] = array();
    }
}

//conseguido de un solo nombre
function realizarAccion($accion){
    switch ($accion) {
        case 'insertar':
            if(isset($_GET["codigo"])) {
                $codigo = $_GET["codigo"];

                array_push($_SESSION["listaPacientes"],$codigo);
            }
            break;
        case 'eliminar':
            unset($_SESSION["listaPacientes"]);
            break;
        case 'atendido':

            break;
    }
}
function generarListaPacientes($personas){
        echo "<ul>";
        foreach ($personas as $persona) {
            crearLista($persona);
        }
        echo "</ul>";
}

function crearLista($codigo){
    echo "<li>{$codigo}</li>";
}

if(isset($_GET["accion"])) {
    $accion = $_GET["accion"];
    realizarAccion($accion);
}

inicializarListaPacientes();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Parte1</title>
</head>
<body>

<h1>Añadir nuevo</h1>
<form action="index.php" method="get">
    <label>Descripcion:</label>
    <input type="text" name="codigo" placeholder="codigo de paciente">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="text" name="apellidos" placeholder="apellidos">
    <input type="hidden" name="accion" value="insertar">
    <input type="submit" name="insertar" value="insertar"><br><br>
    <a href="index.php?accion=eliminar">Borrar todos los pacientes</a><br><br>

</form>

<h2>Pacientes</h2>
<?php
generarListaPacientes($_SESSION["listaPacientes"]);
?>




</body>
</html>
