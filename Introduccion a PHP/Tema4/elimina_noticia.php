<HTML LANG="es">

<HEAD>
   <TITLE>Eliminaci?n de noticias</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">

<?PHP
// Incluir bibliotecas de funciones
   include ("lib/fecha.php");
?>

</HEAD>

<BODY>

<H1>Eliminaci?n de noticias</H1>

<?PHP

   $eliminar = $_REQUEST['eliminar'];
   if (isset($eliminar))
   {

   // Conectar con el servidor de base de datos
      $conexion = mysql_connect ("localhost","userp13","cursphp11")
         or die ("No se puede conectar con el servidor");

   // Seleccionar base de datos
      mysql_select_db ("userp13")
         or die ("No se puede seleccionar la base de datos");

   // Obtener n?mero de noticias a borrar
      $borrar = $_REQUEST['borrar'];
      $nfilas = count ($borrar);

   // Mostrar noticias a borrar
      for ($i=0; $i<$nfilas; $i++)
      {
	  
      // Obtener datos de la noticia i-?sima
         $instruccion = "select * from noticias where id = $borrar[$i]";
         $consulta = mysql_query ($instruccion, $conexion)
            or die ("Fallo en la consulta");
         $resultado = mysql_fetch_array ($consulta);

      // Mostrar datos de la noticia i-?sima
         print ("Noticia eliminada:\n");
         print ("<UL>\n");
         print ("   <LI>T?tulo: " . $resultado['titulo']);
         print ("   <LI>Texto: " . $resultado['texto']);
         print ("   <LI>Categor?a: " . $resultado['categoria']);
         print ("   <LI>Fecha: " . date2string($resultado['fecha']));
         if ($resultado['imagen'] != "")
            print ("   <LI>Imagen: " . $resultado['imagen']);
         else
            print ("   <LI>Imagen: (no hay)");
         print ("</UL>\n");

      // Eliminar noticia
         $instruccion = "delete from noticias where id = $borrar[$i]";
         $consulta = mysql_query ($instruccion, $conexion)
            or die ("Fallo en la eliminaci?n");

      // Borrar imagen asociada si existe
         if ($resultado['imagen'] != "")
         {
            $nombreFichero = "img/" . $resultado['imagen'];
            unlink ($nombreFichero);
         }

      }
      print ("<P>N?mero total de noticias eliminadas: " . $nfilas . "</P>\n");

   // Cerrar conexi?n
      mysql_close ($conexion);

      print ("<P>[ <A HREF='elimina_noticia.php'>Eliminar m?s noticias</A> ]</P>\n");

   }
   else
   {

   // Conectar con el servidor de base de datos
      $conexion = mysql_connect ("localhost","alumne8","cb1234")
         or die ("No se puede conectar con el servidor");

   // Seleccionar base de datos
      mysql_select_db ("alumne8")
         or die ("No se puede seleccionar la base de datos");

   // Enviar consulta
      $instruccion = "select * from noticias order by fecha desc";
      $consulta = mysql_query ($instruccion, $conexion)
         or die ("Fallo en la consulta");

   // Mostrar resultados de la consulta
      $nfilas = mysql_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<FORM ACTION='elimina_noticia.php' METHOD='post'>\n");

         print ("<TABLE>\n");
         print ("<TR>\n");
         print ("<TH>T?tulo</TH>\n");
         print ("<TH>Texto</TH>\n");
         print ("<TH>Categor?a</TH>\n");
         print ("<TH>Fecha</TH>\n");
         print ("<TH>Imagen</TH>\n");
         print ("<TH>Borrar</TH>\n");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysql_fetch_array ($consulta);
            print ("<TR>\n");
            print ("<TD>" . $resultado['titulo'] . "</TD>\n");
            print ("<TD>" . $resultado['texto'] . "</TD>\n");
            print ("<TD>" . $resultado['categoria'] . "</TD>\n");
            print ("<TD>" . date2string($resultado['fecha']) . "</TD>\n");

            if ($resultado['imagen'] != "")
               print ("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] .
                      "'><IMG BORDER='0' SRC='img/ico-fichero.gif' ALT='Imagen asociada'></A></TD>\n");
            else
               print ("<TD>&nbsp;</TD>\n");

            print ("<TD><INPUT TYPE='CHECKBOX' NAME='borrar[]' VALUE='" .
               $resultado['id'] . "'></TD>\n");			//aperece un checkbox para marcar que noticias quieres eliminar

            print ("</TR>\n");
         }

         print ("</TABLE>\n");

         print ("<BR>\n");
         print ("<INPUT TYPE='SUBMIT' NAME='eliminar' VALUE='Eliminar noticias marcadas'>\n");	//submit para ejecutar el eliminar
         print ("</FORM>\n");
      }
      else
         print ("No hay noticias disponibles");

   // Cerrar conexi?n
      mysql_close ($conexion);

   }

?>

</BODY>
</HTML>
