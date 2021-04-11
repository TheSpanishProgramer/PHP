<?php
session_start();
if ($_SESSION['logeado2']) {
    header("Location:gestionpacientes.php");
}
require 'Connect.php';
require 'db.php';

$dbh = connect("localhost", "pacientes", "root", "");

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$usuarios = getAll_Usuarios($dbh);

function comprobarCredenciales($usuarios)
{
    $user = $_GET['user'];
    $pass = $_GET['pass'];

    foreach ($usuarios as $usuario => $dato) {
        if ($dato['usuario'] === $user) {
            if ($dato['contrasena'] === $pass) {
                $_SESSION['logeado2'] = true;
                header("Location:gestionpacientes.php");
            }
        }
    }
    echo "<p style='color: red'>Credenciales incorrectas</p>";
}

if (isset($_GET['action'])) {
    if ($_GET['action'] === "entrar") {
        comprobarCredenciales($usuarios);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Login:</h1>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="entrar">
    <label for="user">Usuario: </label><input type="text" name="user" id="user">
    <br>
    <label for="pass">Contraseña: </label><input type="password" name="pass" id="pass">
    <input type="submit" value="Enviar">
</form>
</body>
</html>
