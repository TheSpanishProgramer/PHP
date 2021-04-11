<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 4</h3>
<h4>Enunciado:</h4>
<p>Modifica el programa 02 para que recoja el nombre y la edad desde la URL.
</p>
<h4>Solución:</h4>
<?php
$nombre = $_GET["nombre"];
$edad = $_GET["edad"];

$frase = "Mi amigo " . $nombre . " tiene " . $edad . " años.";

// Alternativa:
$frase = "Mi amigo $nombre tiene $edad años.";

echo $frase;
?>
</body>
</html>