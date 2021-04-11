<?php
require_once 'ejercicio05-datos.php';

/*** FUNCIONES ***/
function generarTablaProductos($productos) {
    echo "
        <table class='table'>
            <thead>
                <tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Cantidad</th></tr>
            </thead>
            <tbody>
    ";
    foreach ($productos as $id => $producto) {
        crearFilaProducto($id, $producto);
    }
    echo "</tbody></table>";
}

function crearFilaProducto($id, $producto) {
    echo "<tr>
            <td>{$producto['nombre']}</td>
            <td>{$producto['descripción']}</td>
            <td>{$producto['precio']}</td>
            <td><input type='number' name='{$id}' value='0' required></td>
        </tr>";
}
/*** Fin: FUNCIONES ***/
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
    <!-- Añadir Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>
<body>
<h1>Soluciones de ejercicios PHP</h1>
<h2>Tema 2: Formularios</h2>
<h3>Ejercicio 5</h3>
<h4>Enunciado:</h4>
<p>
    Desarrolla una tienda online con un catálogo de productos y un carrito de la compra.
    Cada producto tendrá la siguiente información: nombre, descripción y precio (puedes
    almacenar otra información extra que te sirva de ayuda, como un ID). Se podrán adquirir
    tantas unidades de cada producto como se desee (también podrá eliminarse un producto añadido
    o una unidad del mismo).
</p>
<h4>Solución:</h4>

<h2>Catálogo de productos</h2>
<form action="ejercicio05compra.php" method="get">
    <table class='table'>
        <thead>
            <tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Cantidad</th></tr>
        </thead>
        <tbody>
        <?php
        foreach ($productos as $id => $producto) {
        ?>
        <tr>
            <td><?= $producto['nombre'] ?></td>
            <td><?= $producto['descripción'] ?></td>
            <td><?= $producto['precio'] ?></td>
            <td><input type='number' name='<?= $id ?>' value='0' required></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <input type="submit" value="Comprar" class="btn btn-primary">
</form>


</body>
</html>