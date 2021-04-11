<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 8</h3>
<h4>Enunciado:</h4>
<p>08. Crea una función llamada esMayor() que reciba como parámetros dos números y devuelva TRUE si el primer número es mayor que el segundo.
</p>
<h4>Solución:</h4>

<?php
function esMayor($a, $b){
    return $a>$b;

}
$numeroA = $_GET["a"];
$numeroB = $_GET["b"];
$resultado = esMayor($numeroA, $numeroB);
echo "<p>Resultado de $numeroA x $numeroB = ";
var_export($resultado);
echo "</p>";

?>

</body>
</html>