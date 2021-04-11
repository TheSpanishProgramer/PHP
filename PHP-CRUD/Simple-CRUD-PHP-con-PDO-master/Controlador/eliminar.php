<?php
    require_once ('../Modelo/class.conexion.php');
    require_once ('../Modelo/class.consultas.php');


    if(isset($_GET['id_producto'])){
        $id_producto = $_GET['id_producto'];
        $consultas = new Consultas();
        $mensaje = $consultas->eliminarProducto($id_producto);
        echo $mensaje;
        echo "<div><a href='../Vista/verProductos.php'>Volver </a></div>";
    }
?>