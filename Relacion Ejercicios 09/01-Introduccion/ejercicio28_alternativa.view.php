<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 28</h3>
<h4>Enunciado:</h4>
<p>
    28. Modifica el ejercicio número 26 para obtener el mismo resultado empleando una estructura foreach.
</p>
<h4>Solución:</h4>

<h2>Bienvenido</h2>
<p>El usuario conectado es: <?= $nombre_usuario ?></p>
<ul>
<?php foreach ($marcas as $elemento) {?>
    <li><?= $elemento ?></li>
<?php }?>
</ul>

</body>
</html>