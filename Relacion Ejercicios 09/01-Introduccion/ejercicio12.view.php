<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 12</h3>
<h4>Enunciado:</h4>
<p>
    12. Crea un array con 4 nombres de ciudades (Paris, Berlin, Amsterdam, Praga). A continuación crea las siguientes funciones:
</p>
<ul>
    <li>getValor($array, $posicion): recibe un número como parámetro y devuelve el valor almacenado en el array en dicho índice.</li>
    <li>setValor($array, $posicion, $valor): establece el valor del elemento indicado en la posición y devuelve el array.</li>
</ul>

<h4>Solución:</h4>

<ul>
    <li>Primer elemento: <?= $primerElemento ?></li>
    <li>Segundo elemento: <?= $segundoElemento ?></li>
    <li>Establecer "Vitoria" como segundo elemento.<pre><?php print_r($valores) ?></pre></li>
    <li>Valor del segundo elemento: <?= getValor($valores,1) ?></li>
</ul>

</body>
</html>