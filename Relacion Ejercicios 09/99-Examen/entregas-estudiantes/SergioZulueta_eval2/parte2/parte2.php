<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Parte2</title>
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

<table>
    <thead>
    <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>¿Atendido?</td>
        <td>Atender</td>
    </tr>
    </thead>
    <tbody>
            <?= tabla($items); ?>
    </tbody>
</table>


</body>
</html>
