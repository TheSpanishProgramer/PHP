<HTML LANG="es">

<HEAD>
   <TITLE>Validación de formularios</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<?PHP
   //////////////////////////////////////////////////////////////////////////
   // si el formulario ha sido enviado
   //    validar formulario
   // fsi
   // si el formulario ha sido enviado y los datos son correctos
   //    procesar formulario
   // si no
   //    mostrar formulario
   // fsi
   //////////////////////////////////////////////////////////////////////////

// Obtener valores introducidos en el formulario
	if(isset($_REQUEST['buscar'])){
   $texto = $_REQUEST['texto'];
   $donde = $_REQUEST['donde'];
   $genero = $_REQUEST['genero'];
   $buscar = $_REQUEST['buscar'];
	}

// Comprobar errores
   $error = false;
   if (isset($buscar))
   {
   // Texto de búsqueda
      if (trim($texto) == "")
      {
         $errores["texto"] = "¡Debe introducir el texto de búsqueda!";
         $error = true;
      }
      else
         $errores["texto"] = "";
   }

// Si los datos son correctos, procesar formulario
   if (isset($buscar) && $error==false)
   {
      echo "<H1>Validación de formularios. Resultados del formulario</H1>\n";
      echo "<P>Estos son los datos introducidos:</P>\n";
      echo "<UL>\n";
      echo "   <LI>Texto de búsqueda: ".$texto."\n";
      echo "   <LI>Buscar en: ".$donde."\n";
      echo "   <LI>Género: ".$genero."\n";
      echo "</UL>\n";
      echo "<P>[ <A HREF='ejercicio5.php'>Nueva búsqueda</A> ]</P>\n");
   }
   else
   {
?>

<H1>Validación de formularios</H1>

<H2>Búsqueda de canciones</H2>

<FORM CLASS="borde" ACTION="ejercicio5.php" METHOD="POST">

<P><LABEL>Texto a buscar:</LABEL></P>
<INPUT TYPE="TEXT" SIZE="40" NAME="texto">

<?PHP
   if (isset($buscar))
      echo "";
   else
      echo "\n";
   if (isset($errores["texto"] )!= "")
      echo "<BR><SPAN CLASS='error'>".$errores["texto"]."</SPAN>";
?>

</P>

<P><LABEL>Buscar en:</LABEL>
<INPUT TYPE="RADIO" NAME="donde" VALUE="titulo">Títulos de canción
<INPUT TYPE="RADIO" NAME="donde" VALUE="album">Nombres de álbum
<INPUT TYPE="RADIO" NAME="donde" VALUE="ambos" CHECKED>Ambos campos</P>

<P><LABEL>Género musical:</LABEL>
<SELECT NAME="genero">
   <OPTION SELECTED>Todos
   <OPTION>Acústica
   <OPTION>Banda Sonora
   <OPTION>Blues
   <OPTION>Electrónica
   <OPTION>Folk
   <OPTION>Jazz
   <OPTION>New Age
   <OPTION>Pop
   <OPTION>Rock
</SELECT></P>

<P><INPUT TYPE="SUBMIT" NAME="buscar" VALUE="Buscar"></P>

</FORM>

<?PHP
   }
?>

</BODY>
</HTML>
