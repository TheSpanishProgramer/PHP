<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 13</h3>
<h4>Enunciado:</h4>
<p>
    13. Crea dos arrays, uno con 4 tipos de animales ($animales) y otro con 4 nombres de colores ($colores).
</p>
<ul>
    <li>Calcula el número de elementos de cada array.</li>
    <li>Añade un elemento al final del array $animales utilizando una función.</li>
    <li>Añade un elemento al principio del array $colores utilizando una función.</li>
    <li>Crea un tercer array que incluya los elementos de los dos arrays.</li>
</ul>

<h4>Solución:</h4>

<ul>
    <li>Tamaño primer array: <?= $sizeAnimales ?></li>
    <li>Tamaño primer array: <?= $sizeColores ?></li>
    <li>Tamaño al añadir animal: <?= count($animales) ?>.
        Resultado del array: <pre><?php print_r($animales) ?></pre></li>
    <li>Tamaño al añadir color: <?= count($colores); ?>.
        Resultado del array: <pre><?php print_r($colores) ?></pre></li>

    <li>Dos arrays unidos: <pre><?php  print_r($union) ?></pre></li>
</ul>

</body>
</html>