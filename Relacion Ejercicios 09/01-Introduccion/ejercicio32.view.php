<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 1: Introducción a PHP</h2>
<h3>Ejercicio 32</h3>
<h4>Enunciado:</h4>
<p>
    32. Crea un array asociativo que almacene los nombres de 4 estudiantes y las notas de dos exámenes. A continuación,
    crea de forma dinámica una tabla como la de la imagen utilizando los valores del array y la estructura de repetición
    que creas conveniente. Cuando la nota sea inferior a 5, esta deberá mostrarse en rojo.
</p>
<h4>Solución:</h4>
<table border="1">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Nota media</th>
    </tr>
    </thead>
    <tbody>
    <?= generarContenidoTabla($estudiantes) ?>
    </tbody>
</table>


</body>
</html>