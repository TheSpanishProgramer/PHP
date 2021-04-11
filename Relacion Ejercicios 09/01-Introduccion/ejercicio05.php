<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 5</h3>
<h4>Enunciado:</h4>
<p>05. Crea dos variables, a y b que recojan los valores enviados mediante el método GET. Almacena el resultado de las siguientes operaciones en una nuevas variables y muéstralas por pantalla.
    Resta de a y b
    División de a entre b
    Resultado de a mayor que b
    Resultado de a menor o igual que b
    Nota: para imprimir una variable con valor booleano, utiliza la función var_export($variable).
</p>
<h4>Solución:</h4>
<?php
$numeroA = $_GET["a"];
$numeroB = $_GET["b"];

$resta = $numeroA-$numeroB;
echo "<p>Resta: $resta</p>";
$division = $numeroA/$numeroB;
echo "<p>Division: $division</p>";
$esMayor = $numeroA > $numeroB;
echo "<p>Es mayor: ";
var_export($esMayor);
echo "</p>";
$menorIgual = $numeroA <= $numeroB;
echo "<p>Menor o igual: ";
var_export($menorIgual);
echo "</p>";
?>
</body>
</html>