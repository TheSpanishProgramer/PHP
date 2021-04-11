<?php
    require_once('../Modelo/class.conexion.php');
    require_once('../Modelo/class.consultas.php');
    require_once('../Controlador/cargar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Productos</h1>
    <?php 
        cargar();
    ?>
    <a href="index.html" class="btn btn-secondary">Atras</a>

</body>
</html>