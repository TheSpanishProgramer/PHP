<?php
session_start();

if ($_SESSION['logeado']) {
    header("Location:gestionpacientes.php");
}
require 'datos.php';
/*
    $stmt = $dbh->prepare("SELECT * FROM ");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetchAll();
*/
function comprobarCredenciales($datosUsuarios)
{
    $user = $_GET['user'];
    $pass = $_GET['pass'];

    foreach ($datosUsuarios as $id => $propiedades) {
        if ($propiedades['user'] === $user) {
            if ($propiedades['pass'] === $pass) {
                $_SESSION['logeado'] = true;
                header("Location:gestionpacientes.php");
            }
        }
    }
    echo "<p style='color: red'>Credenciales incorrectas</p>";
}

if (isset($_GET['action'])) {
    if ($_GET['action'] === "entrar") {
        comprobarCredenciales($datosUsuarios);
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
