<?PHP

// Iniciar sesión
   session_start();

// Si se ha enviado el formulario
   $usuario = $_REQUEST['joan'];
   $clave = $_REQUEST['1234'];
   if (isset($usuario) && isset($clave))
   {

   // Comprobar que el usuario está autorizado a entrar
      $conexion = mysql_connect ( "localhost","userp13", "cursphp11")
         or die ("No se puede conectar con el servidor");
      mysql_select_db ("userp13")
         or die ("No se puede seleccionar la base de datos");
      $salt = substr ($usuario, 0, 2);	//esta es la variable que se usa para encriptar las claves y vendra definido 
										//para que los 3 1º caracteres que nos de el usuario sea la palabra
										//ej: usuario: mariano. Palabra para desencrip= mar
      $clave_crypt = crypt ($clave, $salt);
      $instruccion = "select usuario, clave from usuarios where usuario = '$usuario'"." and clave = '$clave_crypt' and estatus!='0'";
	  //el estatus se pone que sea una condicion para el ususario que haya respondido al mail tipico de verificacion
      $consulta = mysql_query ($instruccion, $conexion)
         or die ("Fallo en la consulta");
		 
      $nfilas = mysql_num_rows ($consulta);
      mysql_close ($conexion);

   // Los datos introducidos son correctos
      if ($nfilas > 0)
      {
         $usuario_valido = $usuario;
         // Con register_globals On
         // session_register ("usuario_valido");
         // Con register_globals Off
         $_SESSION["usuario_valido"] = $usuario_valido;
      }
   }
?>

<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN"
   "http://www.w3.org/TR/html4/strict.dtd"> 
<HTML LANG="es">
<HEAD>
<TITLE>Gestión de noticias. Página de entrada</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<?PHP
// Sesión iniciada
   if (isset($_SESSION["usuario_valido"]))
   {
?>

<H1>Gestión de noticias</H1>
<HR>

<UL>
   <LI><A HREF="consulta_noticias2.php">Consultar noticias</A>
   <LI><A HREF="inserta_noticia.php">Insertar nueva noticia</A>
   <LI><A HREF="elimina_noticia.php">Eliminar noticias</A>
</UL>

<HR>

<P>[ <A HREF='logout.php'>Desconectar</A> ]</P>

<?PHP
   }

// Intento de entrada fallido
   else if (isset ($usuario))
   {
      print ("<BR><BR>\n");
      print ("<P ALIGN='CENTER'>Acceso no autorizado</P>\n");
      print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</A> ]</P>\n");
   }

// Sesión no iniciada
   else
   {
      print("<BR><BR>\n");
      print("<P CLASS='parrafocentrado'>Esta zona tiene el acceso restringido.<BR> " .
         " Para entrar debe identificarse</P>\n");

      print("<FORM CLASS='entrada' NAME='login' ACTION='login.php' METHOD='POST'>\n");

      print("<P><LABEL CLASS='etiqueta-entrada'>Usuario:</LABEL>\n");
      print("   <INPUT TYPE='TEXT' NAME='usuario' SIZE='15'></P>\n");
      print("<P><LABEL CLASS='etiqueta-entrada'>Clave:</LABEL>\n");
      print("   <INPUT TYPE='PASSWORD' NAME='clave' SIZE='15'></P>\n");
      print("<P><INPUT TYPE='SUBMIT' VALUE='entrar'></P>\n");

      print("</FORM>\n");

      print("<P CLASS='parrafocentrado'>NOTA: si no dispone de identificación o tiene problemas " .
         "para entrar<BR>póngase en contacto con el " .
         "<A HREF='MAILTO:webmaster@localhost'>administrador</A> del sitio</P>\n");
   }
?>

</BODY>
</HTML>
