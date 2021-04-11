<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 10</h3>
<h4>Enunciado:</h4>
<p>10. Modifica la función anterior para que establezca un valor por defecto a una de las cadenas.
</p>
<h4>Solución:</h4>

<?php
function concatenar($a, $b = "anónimo"){
    return $a.$b;

}

$textoA = $_GET["textoA"];
$textoB = $_GET["textoB"];
$frase = concatenar($textoA);
echo "<p>Frase = $frase</p>";

?>

</body>
</html>