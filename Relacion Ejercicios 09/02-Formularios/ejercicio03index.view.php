<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 2: Formularios</h2>
<h3>Ejercicio 3</h3>
<h4>Enunciado:</h4>
<p>
    03. Crea un array con 20 números aleatorios entre el 1 y el 10. El usuario introducirá en el formulario
    un número y al darle a “Enviar” la aplicación comprobará cuántas veces aparece el número introducido en el array.
    En caso contrario mostrará el mensaje: “Inténtelo de nuevo”.
</p>
<h4>Solución:</h4>

<?php
// Si el usuario ha intentado acertar un número mostramos el mensaje
if(isset($apariciones)) {
    ?>
    El número aparece <?= $apariciones ?> veces en el array.</p>
<?php } ?>

<form action="ejercicio03.php" method="GET">
    <label for="numero">Introduce tu número: </label>
    <input id="numero" name="numero" type="number" required>
    <!-- Podemos pasar los numeros aleatorios en un campo oculto -->
    <input type="hidden" name="numeros" value="<?=  implode(",", $listadoNumeros);?>">
    <input type="submit" value="¡Probar suerte!">
</form>

</body>
</html>