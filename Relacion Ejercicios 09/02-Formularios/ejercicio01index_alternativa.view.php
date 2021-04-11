<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 2: Formularios</h2>
<h3>Ejercicio 1</h3>
<h4>Enunciado:</h4>
<p>
    01. Crea un convertidor de grados Celsius a Farenheit (y viceversa). La aplicación pedirá una cantidad al usuario
    y la unidad mediante un formulario. Una vez enviado, mostrará el resultado de la conversión realizada. El formulario
    siempre se mostrará, de forma que el usuario pueda seguir introduciendo valores.
</p>
<h4>Solución:</h4>

<?php
// Si el usuario ha intentado acertar un número mostramos el mensaje
if(isset($resultado)) {
?>
    <p>
        <b>Resultado de la conversión (<?= $temperatura ?> <?= $unidad ?>): <?= $resultado ?></b>
    </p>
<?php } ?>
<form action="ejercicio01_alternativa.php" method="GET">
    <p>
        <label for="temperatura">Introduce la temperatura:</label>
        <input type="number" id="temperatura" name="temperatura" required>
    </p>
    <p>
        <label for="unidad">Indica la unidad de la temperatura introducida:</label>
        <select id="unidad" name="unidad" required>
            <option value="celsius">Celsius</option>
            <option value="farenheit">Farenheit</option>
        </select>
    </p>
    <p>
        <input type="submit" value="Enviar">
    </p>
</form>

</body>
</html>