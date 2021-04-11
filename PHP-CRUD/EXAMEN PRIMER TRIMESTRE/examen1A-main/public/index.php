<!DOCTYPE html>
<?php
session_start();
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
$total = $articulos->totalRegistro();

//--------Paginacion
$cantidad = 3;
// Calculamos el total de página
$totalPaginas = ($total % $cantidad == 0) ? $total / $cantidad : (int)ceil($total / $cantidad);
$estaPagina = (isset($_GET['page'])) ? $_GET['page'] : 1;
$todos = $articulos->readAll(($estaPagina - 1) * $cantidad, $cantidad);
$articulos = null;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet" />
    <title>Bazar S.A.</title>
</head>

<body style="background-color:lightblue">
    <nav class="navbar navbar-dark bg-dark justify-content-between mt-3 ml-3 mr-3">
        <a class="navbar-brand">Bazar S.A.</a>
        <form class="form-inline" action="cerrarSesion.php">
            <?php
            switch ($perfil) {
                case "Admin":
                    echo "<input class='form-control bg-danger text-light font-weight-bold'  type='text' value='{$nombre}' disabled='true'>";
                    echo "<button class='ml-3 btn btn-danger my-2 my-sm-0' type='submit'><i class='fas fa-sign-out-alt'></i></button>";
                    break;
                case "Normal":
                    echo "<input class='form-control bg-dark text-light font-weight-bold'  type='text' value='{$nombre}' disabled='true'>";
                    echo "<button class='ml-3 btn btn-danger my-2 my-sm-0' type='submit'><i class='fas fa-sign-out-alt'></i></button>";
                    break;
                case "None":
                    echo "<input class='form-control bg-dark text-info font-weight-bold'  type='text' value='{$nombre}' disabled='true'>";
                    echo "<a href='login.php' class='ml-2 btn btn-info'><i class='fas fa-sign-in-alt mr-2'></i>Login</a>";
            }
            ?>

        </form>
    </nav>
    <h3 class="text-center mt-3">Bazar S.A.</h3>
    <div class="container mt-3">
        <?php

        if (isset($_SESSION['mensaje'])) {
            echo "<p class='my-3 p-3 bg-success text-white font-weight-bold'>{$_SESSION['mensaje']}</p>";
            unset($_SESSION['mensaje']);
        }

        if ($perfil == "Admin") {
            echo <<<TXT
        <a href="crearArticulo.php" class="btn btn-success mb-3"><i class="fas fa-plus mr-2"></i>Nuevo Artículo</a>
TXT;
        }
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Preview</th>
                    <?php
                    if (isset($_SESSION['perfil']))
                        echo "<th scope='col'>Acciones</th>";
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = $todos->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>\n";
                    echo "<th scope='row' class='align-middle'>{$filas->nombre}</th>\n";
                    echo "<td class='align-middle'>{$filas->pvp} €</td>\n";
                    echo "<td class='align-middle'>{$filas->stock}</td>\n";
                    echo "<td><img src='{$filas->imagen}' width='90rem' height='90rem' class='rounded-circle'></td>\n";
                    if (isset($_SESSION['perfil'])) {
                        echo "<td class='align-middle'>\n";
                        if ($perfil == "Admin") {
                            echo <<<TXT
<form class="form-inline" action="borrarArticulo.php" method="POST">
<input type="hidden" name="id" value="{$filas->id}" />
<a href="editarArticulo.php?id={$filas->id}&page=$estaPagina" class="btn btn-info mr-2"><i class="fas fa-edit mr-2"></i>Editar</a>
<a href="detalleArticulo.php?id={$filas->id}&page=$estaPagina" class="btn btn-success mr-2"><i class="fas fa-info mr-2"></i>Detalle</a>
<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt mr-2"></i>Borrar</button>
</form>
TXT;
                        } else {
                            echo "<a href='detalleArticulo.php?id={$filas->id}&page={$estaPagina}' class='btn btn-success mr-2'><i class='fas fa-info mr-2'></i>Detalle</a>";
                        }
                        echo "</td>\n";
                    }
                    echo "</tr>\n";
                }

                ?>


            </tbody>
        </table>
        <b>Página: </b>
        <?php
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo <<<TXT
|&nbsp;<a href="{$_SERVER['PHP_SELF']}?page=$i">$i</a>&nbsp|\n
TXT;
        }
        ?>

    </div>
</body>

</html>