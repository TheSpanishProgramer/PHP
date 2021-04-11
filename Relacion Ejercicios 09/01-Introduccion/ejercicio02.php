<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 1</h3>
<h4>Enunciado:</h4>
<p>Crea dos variables llamadas nombre y edad. La variables nombre tendrá el valor “Mikel” y la variable edad tendrá asignado el valor 22. A continuación crea una página que muestre lo siguiente:
    Mi amigo Mikel tiene 22 años.
</p>
<h4>Solución:</h4>
<?php
$nombre = "Mikel";
$edad = 22;

$frase = "Mi amigo " . $nombre . " tiene " . $edad . " años.";

// Alternativa:
$frase = "Mi amigo $nombre tiene $edad años.";

echo $frase;
?>
</body>
</html>