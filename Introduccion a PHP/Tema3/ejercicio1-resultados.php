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
   echo "   <LI>Texto de b�squeda: ".$texto."\n";
   echo "   <LI>Buscar en: ".$donde."\n";
   echo "   <LI>G�nero: ".$genero."\n";
   echo "</UL>\n";
?>

[ <A HREF='ejercicio1.php'>Nueva b�squeda</A> ]

</BODY>
</HTML>
