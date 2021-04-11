<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 7</h3>
<h4>Enunciado:</h4>
<p>07. ¿Cómo mejorarías el ejercicio anterior para que la función sea más reutilizable? Piénsalo bien y modifica la función.
</p>
<h4>Solución:</h4>

<?php
function multiplicar($a, $b){
    return $a*$b;

}
$numeroA = $_GET["a"];
$numeroB = $_GET["b"];
$resultado = multiplicar($numeroA, $numeroB);
echo "<p>Resultado de $numeroA x $numeroB = $resultado</p>";
?>

</body>
</html>