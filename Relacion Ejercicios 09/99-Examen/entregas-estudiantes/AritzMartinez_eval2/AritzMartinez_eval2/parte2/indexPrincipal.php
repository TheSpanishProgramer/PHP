<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<table border="1">
    <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Atendido</td>
        <td>Atender</td>
    </tr>
    <?php

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/


    foreach ($items as $item) {
        echo "<tr>
        <td>$item->codigo</td>
        <td>$item->nombre</td>
        <td>$item->apellidos</td>
        <td>$item->atendido</td>
        <td><a href='index.php?accion=borrar'>Atender </td>
         </tr>";
    }
    ?>
</table>

<form action="index.php" method="get">
    <input type="text" name="codigo">
    <input type="text" name="nombre">
    <input type="text" name="apellidos">
    <input type="text" name="atendido">
    <input type="hidden" name="accion" value="insert">
    <input type="submit" value="Insertar">
</form>
<form action="index.php" method="get">
    <input type="text" name="codigo">
    <input type="hidden" name="accion" value="borrar">
    <input type="submit" value="Borrar">
</form>
<form action="index.php" method="get">
    <input type="text" name="nombre">
    <input type="hidden" name="accion" value="update">
    <input type="submit" value="Update">
</form>

</body>
</html>
