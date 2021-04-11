<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != "Admin" || !isset($_GET['id'])) {
    header("Location:index.php");
    die();
}

$pagina= (isset($_GET['page'])) ? $_GET['page'] : 1;
require "../vendor/autoload.php";

use Clases\Articulos;

$id=$_GET['id'];

function mostrarError($txt){
    global $articulo;
    global $id;
    global $pagina;
    $articulo=null;
    $_SESSION['error']=$txt;
    header("Location:{$_SERVER['PHP_SELF']}?id=$id&page=$pagina");
    die();
}
function isImagen($im){
    return strpos($im, "image");
   
}
//--------
$esteArticulo=new Articulos();
$esteArticulo->setId($id);
$datosArticulo=$esteArticulo->read();

if(isset($_POST['editar'])){
    $nombre=ucwords(trim($_POST['nombre']));
    $pvp=$_POST['pvp'];
    $stock=$_POST['stock'];
    if(strlen($nombre)==0){
        mostrarError("Rellene los campos.");
    }
    $esteArticulo->setNombre($nombre);
    if($esteArticulo->existeNombre()) mostrarError("Ese nombre de articulo YA existe!!!"); 
    $esteArticulo->setPvp($pvp);
    $esteArticulo->setStock($stock);
    if(is_uploaded_file($_FILES["imagen"]['tmp_name'])){
        if(isImagen($_FILES["imagen"]["type"])!==false){
            $nombreIm="./img/".uniqid()."_".$_FILES["imagen"]["name"];
            if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $nombreIm)){
                $esteArticulo->setImagen($nombreIm);
            }
            else{
                mostrarError("Error al guardar la imagen");
            }

        }
        else{
            mostrarError("Debes subir un archivo de tipo imagen!!!");
        }

    }
    else{
        $esteArticulo->setImagen($datosArticulo->imagen);
    }
    $esteArticulo->update();
    $esteArticulo=null;
    $_SESSION['mensaje']="Artícuo actualizado correctamente";
    header("Location:index.php?page=$pagina");

}
else{
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet"/>
    <title>Editar</title>
</head>
<body style="background-color:lightblue">
<nav class="navbar navbar-dark bg-dark justify-content-between mt-3 ml-3 mr-3">
    <a class="navbar-brand">Bazar S.A.</a>

    <form class="form-inline" action="cerrarSesion.php">
        <?php

        echo "<input class='form-control bg-danger text-light font-weight-bold'  type='text' value='{$_SESSION['nombre']}' disabled='true'>";
        echo "<a href='index.php' class='btn btn-primary ml-2'><i class='fas fa-home mr-2'></i>Inicio</a>";
        echo "<button class='ml-3 btn btn-danger my-2 my-sm-0' type='submit'><i class='fas fa-sign-out-alt'></i></button>";

        ?>

    </form>
</nav>
<h3 class="text-center mt-3">Editar artículo</h3>
<div class="container mt-3">
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p class='my-3 p-3 bg-dark text-danger font-weight-bold'>{$_SESSION['error']}</p>";
        unset($_SESSION['error']);
    }
    ?>
    <div class="card text-white bg-dark mb-3 m-auto mt-5" style="max-width: 48rem;">
        <div class="card-header text-center">
        <img src="<?php echo $datosArticulo->imagen; ?>" width="100rem" height="100rem" alt="Imagen articulo" class="rounded-circle"> 
        </div>
        <div class="card-body">
            <form name="login" action="<?php echo $_SERVER['PHP_SELF']."?id=$id&page=$pagina" ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nu">Nombre de Artículo</label>
                    <input type="text" class="form-control" id="nu" value="<?php echo $datosArticulo->nombre; ?>" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="np">PVP (€)</label>
                    <input type="number" class="form-control" id="np" value="<?php echo $datosArticulo->pvp; ?>" name="pvp" required step="0.05" max="9999.99" min="0">
                </div>
                <div class="form-group">
                    <label for="ns">STOCK</label>
                    <input type="number" class="form-control" id="np" value="<?php echo $datosArticulo->stock; ?>" name="stock" required step="1" max="999" min="0">
                </div>
                <div class="form-group">
                    <label for="foto">Imagen</label>
                    <input type="file" class="form-control" id="foto" name="imagen" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success" name="editar"><i class="fas fa-edit mr-2"></i>Editar articulo
                </button>
               

            </form>

        </div>
    </div>

</div>
</body>
</html>
<?php } ?>