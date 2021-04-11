<?
$cod=$_REQUEST["cod"];
	$conexion = mysql_connect ("localhost", "userp13", "cursphp11")
      or die ("No se puede conectar con el servidor");
   mysql_select_db ("userp13")
      or die ("No se puede seleccionar la base de datos");
	  
	//instruccion del cambio de estatus para verificar al usuario
	
	$instruccion="update usuarios set estatus='1' where usuario='".$cod."'";
	
	$consulta = mysql_query ($instruccion, $conexion)
      or die ("Fallo en la inserción");
	
	echo " Usuario validado"
?>