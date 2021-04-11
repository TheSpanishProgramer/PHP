<?php
include 'includes/login.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parte1</title>
</head>
<body>
<h1>Login</h1>
<form method="get" action="action/login.act.php">
    <p>introduce un usuario y contraseña validos (e.g.: jvadillo /1234)</p>
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="text" name="password" placeholder="contraseña">
    <input type="submit" value="Entrar">
</form>
</body>
</html>
