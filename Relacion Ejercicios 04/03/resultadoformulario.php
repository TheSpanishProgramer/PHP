<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        3 - Botón radio y casillas de verificación
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="" title="Color">
</head>

<body>
<h1>3 - Botón radio y casillas de verificación</h1>

<?php


function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}


$Sexo = recoge("Sexo");
$Cine= recoge("Cine");
$Literatura= recoge("Literatura");
$Musica= recoge("Musica");
$ocultar=0;

if (empty($Sexo)) {

    echo "El campo Sexo está vacío.</p>\n";
    $ocultar=1;

}

if (empty($Cine)&& empty($Literatura) && empty($Musica)) {

    echo "El campo aficion está vacío";
    $ocultar = 1;

}

if ($ocultar==0) {

    print "  <p>El sexo seleccionado es: <strong>$Sexo </strong></p>\n";
    print "  <p>La aficion seleccionada es: <strong>$Cine $Literatura $Musica</strong></p>\n";

}

?>

<p><a href="index.html">Volver al formulario.</a></p>

<footer>
</footer>
</body>
</html>

