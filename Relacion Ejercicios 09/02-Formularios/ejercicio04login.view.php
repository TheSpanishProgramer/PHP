<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 2: Formularios</h2>
<h3>Ejercicio 4</h3>
<h4>Enunciado:</h4>
<p>
    04. Crea una pantalla de login con dos campos: usuario y contraseña. El programa deberá validar los datos de acceso
    contra un diccionario de datos como el de la imagen. El programa deberá mostrar un mensaje de bienvenida con su
    nombre y apellidos en caso de que los datos sean correctos.
    También indicará si el usuario introducido no existe o si la contraseña introducida es incorrecta.
</p>
<h4>Solución:</h4>


<?php
// Si hay algún mensaje de error lo mostramos:
if(isset($mensaje_error)) {
?>
    <p style='color:red;'><?= $mensaje_error ?></p>
<?php } ?>

<form action='./ejercicio04.php' method='post'>
    <fieldset>
        <legend>Login</legend>
        <p>Introduce tu usuario y contraseña:</p>
        <p>
            <label for='usuario'>Introduce el usuario:</label>
            <input type='text' id='usuario' name='usuario' required>
        </p>
        <p>
            <label for='password'>Introduce la contraseña:</label>
            <input type='password' id='password' name='password' required>
        <p>
        <p>
            <input type='submit' value='Enviar'>
        </p>
    </fieldset>
</form>

</body>
</html>