<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 3</h3>
<h4>Enunciado:</h4>
<p>Crea un programa que muestre un nombre de usuario enviado en la URL.
</p>
<h4>Solución:</h4>
<?php
$usuario = $_GET["usuario"];

$saludo = "Bienvenido, $usuario";

echo $saludo;
?>
</body>
</html>