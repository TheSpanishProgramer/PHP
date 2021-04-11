<?php

    function cargar(){
        $consultas = new Consultas();
        $filas = $consultas->cargarProductos();

        echo "<table class="."table".">
                <thead class="."thead-dark".">
                <tr>
                    <th scope="."col".">id_producto</th> 
                    <th scope="."col".">nombre</th>
                    <th scope="."col".">descripcion</th>
                    <th scope="."col".">categoria</th>
                    <th scope="."col".">precio</th>
                    <th scope="."col"." colspan="."2"."></th>
                    <th scope="."col"." colspan="."2"."></th>
                    </tr>
                </thead>";
        if($filas){

            foreach($filas as $fila)
            {
                echo "<tr>";
                echo "<th scope="."col".">".$fila['id_producto']."</th>";
                echo "<th scope="."col".">".$fila['nombre']."</th>";
                echo "<th scope="."col".">".$fila['descripcion']."</th>";
                echo "<th scope="."col".">".$fila['categoria']."</th>";
                echo "<th scope="."col".">".$fila['precio']."</th>";
                echo "<th scope="."col"."><a href="."../Controlador/eliminar.php?id_producto=".$fila['id_producto'].">Eliminar</a></th>";
                echo "<th scope="."col"."><a href="."../Vista/formModificarProducto.php?id_producto=".$fila['id_producto'].">Modificar</a></th>";
                echo "</tr>";
            }
            
            echo "</table>";
        }
    }



?>