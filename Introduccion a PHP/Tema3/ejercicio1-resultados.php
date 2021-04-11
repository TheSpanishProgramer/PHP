<HTML LANG="es">

<HEAD>
   <TITLE>Formulario simple. Resultados del formulario</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<H1>Formulario simple. Resultados del formulario</H1>

<P>Estos son los datos introducidos:</P>

<?PHP
   $texto = $_REQUEST['texto'];
   $donde = $_REQUEST['donde'];
   $genero = $_REQUEST['genero'];

   echo "<UL>\n";
   echo "   <LI>Texto de búsqueda: ".$texto."\n";
   echo "   <LI>Buscar en: ".$donde."\n";
   echo "   <LI>Género: ".$genero."\n";
   echo "</UL>\n";
?>

[ <A HREF='ejercicio1.php'>Nueva búsqueda</A> ]

</BODY>
</HTML>
