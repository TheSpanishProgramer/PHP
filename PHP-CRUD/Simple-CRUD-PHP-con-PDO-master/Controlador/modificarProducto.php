<?php
    require_once ('../Modelo/class.conexion.php');
    require_once ('../Modelo/class.consultas.php');


    $mensaje = null;
    //El controlador debe:
    //Obtener los datos.
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];

    $consultas = new Consultas();
    $mensaje = $consultas->modificarProducto($id_producto,$nombre,$descripcion,$categoria,$precio);
    echo '<a href="../Vista/verProductos.php"> Atras</a>';


    



?>