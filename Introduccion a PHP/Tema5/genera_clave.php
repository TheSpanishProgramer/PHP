<HTML LANG="es">
<HEAD>
   <TITLE>Inserción de usuario</TITLE>
</HEAD>

<BODY>

<?PHP
// Escribir aquí el nombre y la clave del usuario que se desea crear
   $usuario="ana";
   $clave="sanz11";
   $email="joanarcusa@gmail.com";
   
   $conexion = mysql_connect ("localhost","userp13","cursphp11")
      or die ("No se puede conectar con el servidor");
   mysql_select_db ("userp13")
      or die ("No se puede seleccionar la base de datos");
   $salt = substr ($usuario, 0, 2);
   $clave_crypt = crypt ($clave, $salt);
   $instruccion = "insert into usuarios (usuario, clave, email) values ('$usuario', '$clave_crypt', '$email')";
   $consulta = mysql_query ($instruccion, $conexion)
      or die ("Fallo en la inserción");
	  include("firstemail.php");	//esto manda un mail al usuario para que lo active
   mysql_close ($conexion);
   print ("Usuario $usuario insertado con éxito\n");
?>

</BODY>
</HTML>
