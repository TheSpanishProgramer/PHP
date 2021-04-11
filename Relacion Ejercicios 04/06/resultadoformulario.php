<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        6.- Formulario extra
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>6.- Formulario extra</h1>
<?php

    if (empty($_POST['aficiones'])){
        echo "Selecciona al menos una afición";
        echo "<p>";
    } else if (is_array($_POST['aficiones'])) {
        $seleccionado = '';
        $num_aficiones = count($_POST['aficiones']);
        $actual = 0;
        foreach ($_POST['aficiones'] as $clave => $valor) {
            if ($actual != $num_aficiones-1)
                $seleccionado .= $valor.', ';
            else
                $seleccionado .= $valor.'.';
            $actual++;
        }
        echo '<div><strong>Tus aficiones son:</strong><br><br> '.$seleccionado.'</div>';
        echo "<p>";
    }

if (empty($_POST['pizza'])){
    echo "Selecciona al menos un ingrediente de pizza";
} else if (is_array($_POST['pizza'])) {
    $selecciopizza = '';
    $num_pizza = count($_POST['pizza']);
    $actualpizza = 0;
    foreach ($_POST['pizza'] as $clavepi => $valorpi) {
        if ($actualpizza != $num_pizza-1)
            $selecciopizza .= $valorpi.', ';
        else
            $selecciopizza .= $valorpi.'.';
        $actualpizza++;
    }
    echo '<div><strong>Los ingredientes de tu pizza son:</strong> <br><br>'.$selecciopizza.'</div>';
}
?>

<p><a href="index.html">Volver al formulario.</a></p>

<footer>
</footer>
</body>
</html>

