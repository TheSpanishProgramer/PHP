<?php
    /*Se respeta el orden: primero conexion y despues consulta.
      Porque consultas utiliza conexion.*/ 
    require_once ('../Modelo/class.conexion.php');
    require_once ('../Modelo/class.consultas.php');

    
    $mensaje = null;
    //El controlador debe:
    //Obtener los datos.
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];

    //Validar datos.
    if( (strlen($nombre)> 0) && (strlen($descripcion)>0) && (strlen($categoria)>0) && (strlen($precio)>0))
    {
        $consultas = new Consultas();
        $mensaje = $consultas->insertarProducto($nombre,$descripcion,$categoria,$precio);
        echo '<a href="../Vista/formAgregarProducto.html"> Nuevo Producto</a>';
    }
    else
    {
        echo "Completa los campos por favor!";
    }

    //Lanzar mensaje despúes de obtener datos y validar.

    echo $mensaje;


?>