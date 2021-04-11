<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "Hola examen!";

/*
    -Conexion con bd
    -Comprobar si existe el usuario en la bd
    -Si existe entrar en pacientes.php
    -Si no existe no hacer nada.
*/
?>

<div id="login">
    <h1> Login</h1>
    <h3>Introduce un usuario y contraseña válidos (e.g.:jvadillo / 1234)</h3>

    <form action="index.php" method="post">
        <input type="text" name="user" id="user" placeholder="Usuario"/>
        <input type="password" name="password" id="password" placeholder="Password"/>
        <input type="submit" name="entrar" id="entrar" value="Entrar"/>
    </form>
</div>


</body>
</html>