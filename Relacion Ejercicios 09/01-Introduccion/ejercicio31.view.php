<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 31</h3>
<h4>Enunciado:</h4>
<p>
    31. Crea una aplicación que genere un array con 20 números aleatorios con valores entre 1 y 999, utilizando la función random_int(1, 999) para generar los valores. A continuación recorre el array utilizando la sentencia foreach y muestra por pantalla el valor más alto y el más bajo.
</p>

<ul>
    <li>El array generado es: <?= implode(',',$numeros) ?></li>
    <li>El valor más bajo del array es <?= valorMasBajo($numeros) ?></li>
    <li>El valor más alto del array es <?= valorMasAlto($numeros) ?></li>
</ul>

</body>
</html>