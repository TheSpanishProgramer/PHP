<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 6</h3>
<h4>Enunciado:</h4>
<p>06. Crea una función llamada multiplicar que reciba dos variables, a y b, y muestre el resultado de la multiplicación por pantalla. Para probar el ejercicio se enviarán los valores mediante una petición GET.
</p>
<h4>Solución:</h4>

<?php
function multiplicar($a, $b){
    $resultado = $a*$b;
    echo "<p>Resultado de $a x $b = $resultado</p>";
}
$numeroA = $_GET["a"];
$numeroB = $_GET["b"];
multiplicar($numeroA, $numeroB);
?>

</body>
</html>