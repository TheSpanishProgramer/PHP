<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>
<body>
<h1>Tienda online</h1>
<h2>Compra realizada correctamente</h2>
<h3>Precio total:</h3>
<p>
    El importe total de la compra realizado es de <?= calcularImporte($productos) ?> euros.
</p>
<h3>Detalle de la compra</h3>

<ul>
<?php
foreach ($productos as $id => $producto){
    if (isset($_GET[$id]) &&  $_GET[$id] > 0){
?>
        <li><?= $producto['nombre'] ?> (<?=$_GET[$id]?>)</li>
<?php
    }
}
?>
</ul>

<a href="ejercicio05.php" class="btn btn-primary">Volver a la tienda</a>

</body>
</html>