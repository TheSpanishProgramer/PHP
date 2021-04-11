<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h2>
Base de datos <u>banco</u><br>
Tabla <u>clientes</u><br>
</h2>
  <?php
    /*
     * En msqli, como programacion o.o se usan metodos y atributos (connect_errno,query,fetch_object,select_db).
     * El signo -> se usa para aplicar metodos o indicar atributos.
     * [$cliente->nombre] Nombre es un atributo de $cliente.
     */
    
      // Realiza conexion el servidor de base de datos.
      $conexion = new mysqli("localhost", "root", "root");
      if ($conexion->connect_errno > 0) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $conexion->connect_error);
      } else {
      
      // Seleciona la base de datos y la codificacion.
      $conexion->select_db("banco");
      $conexion->set_charset("utf8");
      
      // Hace la consulta
      $consulta = $conexion->query('SELECT * FROM cliente');
      
      // Muestra resultado
      
      
      // Muestra resultados
      while($cliente = $consulta->fetch_object()){
        echo "Nombre: " . $cliente->dni . "<br>";
        echo "Cargo: " . $cliente->nombre . "<br>";
        echo "Sueldo: " . $cliente->direccion . "€<br><br>";
      }
    }
  ?>
</body>
</html>