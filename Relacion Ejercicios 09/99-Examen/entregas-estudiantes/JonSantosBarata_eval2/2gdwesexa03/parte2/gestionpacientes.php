<?php
session_start();
if (!$_SESSION['logeado2']) {
    header("Location:index.php");
}

require 'Connect.php';
require 'db.php';

$dbh = connect("localhost", "pacientes", "root", "");

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$pacientes = getAll_Pacientes($dbh);

function insertarPacientes($dbh, $paciente)
{
    insertPaciente($dbh, $paciente);
}

function marcarPaciente($dbh, $paciente)
{
    updateAtendidoByID($dbh, $paciente);
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "insertar":
            $paciente = [
                'cod' => $_GET['cod'],
                'nombre' => $_GET['nombre'],
                'apellidos' => $_GET['apellidos'],
                'atendido' => $_GET['atendido']];
            insertarPacientes($dbh, $paciente);
            break;
        case "marcar":
            $paciente = [
                'id' => $_GET['id']
            ];
            marcarPaciente($dbh, $paciente);
            break;
        case "borrartodo":
            deleteAll($dbh);
            break;
    }
    header("Location:gestionpacientes.php");

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Añadir nuevo</h1>
<form action="gestionpacientes.php" method="get">
    <input type="hidden" name="action" value="insertar">
    <h3>Datos: </h3>
    <input type="hidden" name="atendido" value="0">
    <input type="text" name="cod" id="cod" placeholder="Código">
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
    <input type="submit" value="Añadir">
</form>
<h1>Listado de pacientes</h1>
<h3>Atendido 0 = no atendido</h3>
<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendido?</th>
        <th>Atender</th>
    </tr>
    <?php
    foreach ($pacientes as $paciente => $dato) {
        echo "<tr>";
        echo "<td>" . $dato['codigo'] . "</td>";
        echo "<td>" . $dato['nombre'] . "</td>";
        echo "<td>" . $dato['apellidos'] . "</td>";
        echo "<td>" . $dato['atendido'] . "</td>";
        echo "<td><a href='gestionpacientes.php?action=marcar&id=" . $dato['id'] . "'>Marcar</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="gestionpacientes.php?action=borrartodo">Borrar todos los pacientes</a>
</body>
</html>