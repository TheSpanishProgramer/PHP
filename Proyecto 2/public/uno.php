<?php
require "../src/ejemplo.php";
use const Proyecto\PI;
use function Proyecto\saludo;
use Proyecto\Prueba;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: cadetblue;">
    <?php
    echo "<p>La constante vale: ".PI. "</p>";
    saludo();
    $miPrueba = new Prueba();
    $miPrueba->saludoClase("Manolo");
    ?>
</body>
</html>