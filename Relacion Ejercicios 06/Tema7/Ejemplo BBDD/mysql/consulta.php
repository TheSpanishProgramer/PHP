<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
  /* Primero hacemos la conexion a msql*/
  $conexion = mysql_connect("localhost", "root", root);
  
  /* Luego conectamos con la base de datos deseada*/
  mysql_select_db("banco", $conexion);
  mysql_set_charset('utf8');
  
  /* Hacemos la consulta con query*/
  // FORMA 1
    $dni = 123456;
    //$datosEmpleadoConsulta = 'SELECT * FROM empleado WHERE dni="' . $dni . '"';
    $datosEmpleadoConsulta = "SELECT * FROM empleado WHERE dni=".$dni;
    $consulta = mysql_query($datosEmpleadoConsulta, $conexion);
  // FORMA 2
    //$consulta = mysql_query('SELECT * FROM empleado WHERE dni="13579"', $conexion);
  
  /* Mostrar resultado con result, en la fila 0.*/
  echo "Nombre: " . mysql_result($consulta, 0, "nombre") . "<br>";
  echo "Cargo: " . mysql_result($consulta, 0, "cargo") . "<br>";
  echo "Sueldo: " . mysql_result($consulta, 0, "sueldo") . "€<br>";
  ?>
</body>
</html>