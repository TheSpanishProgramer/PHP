<?php
session_start();
if(!isset($_GET['id']) || !isset($_SESSION['perfil'])){
    header("Location:index.php");
    die();
}
$id=$_GET['id'];
$estaPagina = (isset($_GET['page'])) ? $_GET['page'] : 1;
require "../vendor/autoload.php";

use Clases\Articulos;


if (!isset($_SESSION['perfil'])) {
    $nombre = "Invitado";
    $perfil = "None";
} else {
    $nombre = $_SESSION['nombre'];
    $perfil = $_SESSION["perfil"];
}

$articulos = new Articulos();
$articulos->setId($id);
$datos = $articulos->read();
$articulos = null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet" />
    <title>Detalle</title>
</head>

<body style="background-color:lightblue">
    <nav class="navbar navbar-dark bg-dark justify-content-between mt-3 ml-3 mr-3">
        <a class="navbar-brand">Bazar S.A.</a>
        <form class="form-inline" action="cerrarSesion.php">
            <?php
            switch ($perfil) {
                case "Admin":
                    echo "<input class='form-control bg-danger text-light font-weight-bold'  type='text' value='{$nombre}' disabled='true'>";
                    echo "<a href='index.php?page={$estaPagina}' class='btn btn-primary ml-2'><i class='fas fa-home mr-2'></i>Inicio</a>";
                    echo "<button class='ml-3 btn btn-danger my-2 my-sm-0' type='submit'><i class='fas fa-sign-out-alt'></i></button>";
                    break;
                case "Normal":
                    echo "<input class='form-control bg-dark text-light font-weight-bold'  type='text' value='{$nombre}' disabled='true'>";
                    echo "<a href='index.php?page={$estaPagina}' class='btn btn-primary ml-2'><i class='fas fa-home mr-2'></i>Inicio</a>";
                    echo "<button class='ml-3 btn btn-danger my-2 my-sm-0' type='submit'><i class='fas fa-sign-out-alt'></i></button>";
                    break;
                
            }
            ?>

        </form>
    </nav>
    <h3 class="text-center mt-3">Detalle</h3>

    <div class="container mt-3">
        <div class="card text-white bg-dark mb-3 m-auto mt-5" style="max-width: 48rem;">
            <div class="card-header text-center">
                <img src="<?php echo $datos->imagen; ?>" width="200rem" height="200rem" alt="Imagen articulo" class="img-thumbnail">
            </div>
            <div class="card-body h5">
                <div class="row">
                    <div class="col-3 font-weight-bold">Código:</div>
                    <div class="col"><?php echo $datos->id; ?></div>
                </div>
                <div class="row mt-4">
                    <div class="col-3 font-weight-bold">Nombre:</div>
                    <div class="col"><?php echo $datos->nombre; ?></div>
                </div>
                <div class="row mt-4">
                    <div class="col-3 font-weight-bold">Precio:</div>
                    <div class="col"><?php echo $datos->pvp." €"; ?></div>
                </div>
                <div class="row mt-4">
                    <div class="col-3 font-weight-bold">Stock:</div>
                    <div class="col"><?php echo $datos->stock." unidades."; ?></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>