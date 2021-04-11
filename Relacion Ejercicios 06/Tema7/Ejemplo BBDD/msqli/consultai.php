<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h2>
Base de datos <u>banco</u><br>
Tabla <u>empleados</u><br>
</h2>
  <?php
    /*
     * En msqli, como programacion o.o se usan metodos y atributos (connect_errno,query,fetch_object,select_db).
     * El signo -> se usa para aplicar metodos o indicar atributos.
     * [$empleado->nombre] Nombre es un atributo de $empleado.
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
      $consulta = $conexion->query('SELECT * FROM empleado WHERE dni="13579"');

      // Muestra resultados
      $empleado = $consulta->fetch_object();
        echo "dni: " . $empleado->dni . "<br>";
        echo "nombre: " . $empleado->nombre . "<br>";
        echo "cargo: " . $empleado->cargo . "€<br><br>";
      
    }
  ?>
</body>
</html>