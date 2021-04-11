<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 16</h3>
<h4>Enunciado:</h4>
<p>
    16. Crea una función que reciba 2 números obtenidos mediante GET. La aplicación deberá realizar la siguiente operación:
</p>
<li>
    Si los números son distintos, mostrará el resultado de su suma.
</li>
<li>
    Si los números son iguales, mostrará el resultado de su multiplicación.
</li>
<h4>Solución:</h4>

<ul>
    <li>Números recibidos: <?= $numeroA ?> y <?= $numeroB?></li>
    <li>Resultado: <?= comparar($numeroA, $numeroB) ?></li>
</ul>

</body>
</html>