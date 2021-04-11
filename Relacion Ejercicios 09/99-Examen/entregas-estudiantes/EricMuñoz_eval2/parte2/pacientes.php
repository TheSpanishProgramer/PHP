<?php
include 'bbdd.php';
include "includes/pacientes.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parte1</title>
</head>
<body>
<h1>Añadir nuevo</h1>
<form method="get" action="action/pacientes.act.php">
    <label>Descripcion:</label>
    <input type="number" name="codigo" placeholder="codigo del paciente">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="text" name="apellidos" placeholder="apellidos">
    <input type="submit" value="Añadir">
</form>
<h1>Lista de Pacientes</h1>
<p>Si el valor entre parentesis es 0, significa que el paciente no esta atendido</p>
<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>¿Atendido?</th>
        <th>Atender</th>
    </tr>
    <?php include 'includes/pacientes.print.php'; ?>
</table>
<a href="action/pacientes.act.php?action=delete">Borrar todos los pacientes</a>
</body>
</html>
