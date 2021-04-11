<?php

    require_once ('../Modelo/class.conexion.php');
    require_once ('../Modelo/class.consultas.php');

    if(isset($_GET['id_producto']))
    {    
        $id_producto = $_GET['id_producto'];
        $consultas = new Consultas();
        $filas = $consultas->cargarProducto($id_producto);
    }
    $fila = $filas[0];
    
    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Insertar Datos</title>
</head>
<body>

    <section style="display:block; margin:auto; width:40%; background-color:rgba(144, 144, 144, 0.8); padding: 20px; margin-top:20px;">
        
        <h1 class="display-4" style="margin-bottom:40px;">Ingrese un producto</h1>


        <!--Formulario de insertar datos: Nombre|Descripcion|Categoria|Precio-->
        <!--Form Gruop de BootStrap-->
        <form method="POST" action="../Controlador/modificarProducto.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="<?php echo $fila['nombre']; ?>" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"
                           ><?php echo $fila['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Categoria</label>
                <input type="text" class="form-control" name="categoria" id="exampleInputEmail1" aria-describedby="emailHelp"
                       value="<?php echo $fila['categoria']; ?>" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Precio</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                <input type="text" name="precio" class="form-control" id="exampleInputEmail1"
                       value="<?php echo $fila['precio']; ?>" >
            </div>

            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>

        <a href="index.html" class="btn btn-secondary">Atras</a>
        
    
    </section>


    
</body>
</html>