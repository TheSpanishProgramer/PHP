<?php


/*
* La clase consultas tiene como funciones
* los querys para ejecutar en la base de 
* datos: Create   |  Read  | Update  |Delete.  
*        insertar | cargar | 
*/

class Consultas{

    
    
    /*
      Pre: campos de un registro de la tabla productos. 
      Post: guarda en la DB un registro.
    */
    public function insertarProducto($arg_nombre,
                                     $arg_descripcion,
                                     $arg_categoria,
                                     $arg_precio)
    {
        $conexion = new Conexion();
        
        $base = $conexion->get_conexion();
        
        $sql = "INSERT INTO productos (nombre,descripcion,categoria,precio) 
                VALUES(:nombre, :descripcion, :categoria, :precio)";

        $statement = $base->prepare($sql);

        $statement->bindParam(':nombre',$arg_nombre);
        $statement->bindParam(':descripcion',$arg_descripcion);
        $statement->bindParam(':categoria',$arg_categoria);
        $statement->bindParam(':precio',$arg_precio);

        if ( !$statement) //No tiene nada statement (no creo) la sql esta mal 
                          // y el prepare tambien.
        {
            $mensaje = "Error al cargar/insertar el registro";
        }
        else
        {
            $statement->execute();
            $mensaje = "Se ha cargado/insertado correctamente";
        }
        return $mensaje;

        /*
        $resultado = $base->prepare($sql);

        $resultado->exec(array("Campo"));

        $fila = $resultado->fetch(PDO::FETCH_ASSOC);

        echo $fila['CAMPO'];

        $resultado->closeCursor(); // borro la memoria.
        */
    
    }//fin de la funcion insertarProducto.



    /*
    * Post: carga todos los registros de productos en memoria. En 
    *        un arreglo. Retorna el arreglo con el registro.
    *       Se recomienda usar este metodo para despues mostrar
    *       por pantalla lo que se cargo.
    */
    public function cargarProductos(){
        $fila = null;
        $conexion = new Conexion();
        $base = $conexion->get_conexion();

        $sql = "SELECT id_producto,nombre,descripcion,categoria,precio 
                FROM productos";
        
        $statement = $base->prepare($sql); 

        $statement->execute();

        while ( $resultado = $statement->fetch() )
        {
            $fila[] = $resultado;
        }

        return $fila;


    }//fin del metodo cargarProductos.



    public function cargarProducto($arg_id_producto){
        $fila = null;
        $conexion = new Conexion();
        $base = $conexion->get_conexion();

        $sql = "SELECT id_producto,nombre,descripcion,categoria,precio 
                FROM productos WHERE id_producto=:id_producto";
        
        $statement = $base->prepare($sql); 
        $statement->bindParam(':id_producto',$arg_id_producto);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $fila[] = $resultado;

        return $fila;


    }//fin del metodo cargarProducto.




    public function eliminarProducto($arg_id_producto){
        $conexion = new Conexion();
        $base = $conexion->get_conexion();

        $sql = "DELETE FROM productos WHERE id_producto = :id_producto";

        $statement = $base->prepare($sql);
        $statement->bindParam(':id_producto', $arg_id_producto);
        if(!$statement){
            return "No se ha eliminado!";
        }else{
            $statement->execute();
            return "se ha eliminado!";
        }

    }//fin del metodo eliminarProducto.


    public function modificarProducto($arg_id_producto,
                                      $arg_nombre,
                                      $arg_descripcion,
                                      $arg_categoria,
                                      $arg_precio)
    {
        $conexion = new Conexion();
        $base = $conexion->get_conexion();

        $sql = "UPDATE productos 
                SET  nombre = :nombre,
                     descripcion = :descripcion,
                     categoria = :categoria,
                     precio = :precio
                WHERE id_producto = :id_producto";
        
        $statement = $base->prepare($sql);
        $statement->bindParam(':id_producto',$arg_id_producto);
        $statement->bindParam(':nombre',$arg_nombre);
        $statement->bindParam(':descripcion',$arg_descripcion);
        $statement->bindParam(':categoria',$arg_categoria);
        $statement->bindParam(':precio',$arg_precio);

        if(!$statement)
        {
            return "Ha ocurrido un error!";
        }else{
            $statement->execute();
            return "Se ha modificado!";
        }


    }


}//fin de la clase Consultas.

?>