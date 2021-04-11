<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 22</h3>
<h4>Enunciado:</h4>
<p>
    22. Crea un array con nombres de países y a continuación una función que reciba el nombre de un país y recorra el array, comprobando valor por valor si alguno de ellos es igual al del parámetro recibido. Devolverá la posición en la que se encuentre o el valor -1 en caso de no encontrarlo.
</p>
<h4>Solución:</h4>

<ul>
    <li>La posición de Islandia es: <?= encontrarPosicion($paises, "Islandia") ?></li>
    <li>La posición de Marruecos es: <?= encontrarPosicion($paises, "Marruecos") ?></li>
    <li>La posición de Brasil es: <?= encontrarPosicion($paises, "Brasil") ?></li>
    <li>La posición de Andorra es: <?= encontrarPosicion($paises, "Andorra") ?></li>
</ul>

</body>
</html>