<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 29</h3>
<h4>Enunciado:</h4>
<p>
    29. Modifica el ejercicio número 24 para obtener el mismo resultado empleando una estructura foreach.
</p>
<h4>Solución:</h4>

<table border='1'>
<?php foreach ($agenda as $elemento) {?>
    <tr>
        <td><?= $elemento["nombre"] ?></td>
        <td><?= $elemento["apellidos"] ?></td>
        <td><?= $elemento["telefono"] ?></td>
        <td><?= $elemento["email"] ?></td>
    </tr>
<?php } ?>
</table>

</body>
</html>