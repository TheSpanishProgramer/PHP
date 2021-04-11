<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>

<body>
<?php
// Variables para los valores de "nombre", "contraseña"
$nombre = $_REQUEST["usuario"];
$password = $_REQUEST["pass"];
$archivo = "datos.txt";
$usuarios = count(file($archivo));
$usuarios++;//contador para saber cuantos usuarios tenemos en el fichero en principio es uno por linea, con lo cual por eso contamos las lineas

// Variables para la fecha y hora actuales
$fecha = date("d/m/Y");
$hora = date("H:i:s");

// Abre el archivo datos.txt
$numeroUsuario = fopen("datos.txt", "rb");

// Abrimos el archivo otra vez
$datos = fopen("datos.txt", "ab");

// Escribe los datos introducidos separados por ";"
fwrite($datos,$usuarios.";". $nombre.";".$password.";".$fecha.";".$hora."\n");
// Cerramos el fichero de datos
fclose($datos);


?>
</body>
</html>