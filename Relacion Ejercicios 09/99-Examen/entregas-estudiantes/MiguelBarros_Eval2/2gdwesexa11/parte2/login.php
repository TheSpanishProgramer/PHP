<?php
include "mysql.php";

$dbh = connect();

if (isset($_GET["usuario"]) && isset($_GET["contrasena"])) {
    $nombreUsuario= $_GET["usuario"];
    $contrasena = $_GET["contrasena"];

    comprobarLogin($dbh, $contrasena, $nombreUsuario);
}

 ?>

<html>
<head>

</head>
<body>
<form action="login.php" method="get">
    <h1>Login</h1>
    <p>Introduce un usuario y contraseña válidos</p>

    <input type="text" name="usuario">
    <input type="text" name="contrasena">
    <input type="submit" value="Entrar">
</form>
</body>
</html>
