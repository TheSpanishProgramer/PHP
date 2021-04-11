<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:index.php');
} 

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>login</title>
</head>

<body style="background-color:cadetblue">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Ventas S.A.</a>
        <form class="form-inline" action="cerrar.php">
            <?php
            if ($_SESSION['perfil'] == 0) {
                echo "<input class='form-control bg-danger text-light font-weight_bold mr-2' value='{$_SESSION['usuario']}' disabled='true'>";
            } else {
                echo "<input class='form-control bg-dark text-light font-weight_bold mr-2' value='{$_SESSION['usuario']}' disabled='true'>";
            }
            ?>
            <button class="btn btn-warning" type="submit"><i class="fa fa-sign-out-alt" aria-hidden="true"></i>
            </button>
        </form>
    </nav>
    <h3 class="text-center my-3">Sitio del Usuario</h3>

    <div class="container">
        <a href="sitio.php" class="btn btn-primary"><i class="fas fa-home mr-3"></i>Volver</a>

    </div>
</body>

</html>