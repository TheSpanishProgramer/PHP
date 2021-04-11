<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 9</h3>
<h4>Enunciado:</h4>
<p>09. Escribe una función que reciba como parámetro dos cadenas de texto y devuelva la concatenación de dichas cadenas. Muestra el resultado obtenido por pantalla.
</p>
<h4>Solución:</h4>

<?php
function concatenar($a, $b){
    return $a.$b;

}

$textoA = $_GET["textoA"];
$textoB = $_GET["textoB"];
$frase = concatenar($textoA, $textoB);
echo "<p>Frase = $frase</p>";

?>

</body>
</html>