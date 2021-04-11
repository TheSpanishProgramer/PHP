<?php
include_once "BD.php";
$dbh = connect()



?>

<html>
<head><title>Pacientes</title></head>

<body>


<h1>Añadir Nuevo</h1>
<form action="pacientes.php" method="get">
    <label>Descripcion:</label>
    <input type="text" name="codigoPaciente" placeholder="Codigo del paciente...">
    <input type="text" name="nombrePaciente" placeholder="Nombre...">
    <input type="text" name="apellidoPaciente" placeholder="Apellido...">

    <input type="submit" value="añadir">
</form>

<h1>LISTA DE PACIENTES</h1>
<table>
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Atendido?</th>
        <th>Atender</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php pintarTabla()?>
    </tr>
    </tbody>


</table>
</body>
</html>

