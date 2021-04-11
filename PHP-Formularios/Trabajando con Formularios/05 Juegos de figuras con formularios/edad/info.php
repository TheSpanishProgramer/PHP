<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
</head>
<body>
<?php
$nombre = $_POST["nombre"];
$edad = $_POST ["edad"];
?>
<table>
    <tr>
        <td><h3>Nombre</h3></td>
        <td><?php echo $nombre; ?></td>
    </tr>
    <tr>
        <td><h3>Edad</h3></td>
        <td><?php echo $edad; ?></td>
    </tr>
</table>
</body>
</html>