<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        1 - Dos cajas de texto con comprobación
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="" title="Color">
</head>

<body>
<h1>1 - Dos cajas de texto con comprobación</h1>

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


$nombre = recoge("nombre");
$apellidos = recoge("apellidos");
$ocultar=0;
//Si los campos están vacío
if (empty($nombre)) {
    echo "El campo nombre está vacío.</p>\n";
    $ocultar=1;
}
if (empty($apellidos)) {
    echo "El campo apellidos está vacío";
    $ocultar = 1;
}
if ($ocultar==0) {

    print "  <p>Su nombre es <strong>$nombre $apellidos</strong>.</p>\n";

}

?>

<p><a href="index.html">Volver al formulario.</a></p>

<footer>
</footer>
</body>
</html>

