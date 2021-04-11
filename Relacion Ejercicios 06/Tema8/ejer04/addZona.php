<?php 
session_start();
require_once 'Zona.php';

// Recibe datos de formulario
$tipo = $_POST['tipo'];
$aforo = $_POST['aforo'];
$precio = $_POST['precio'];


// Recupero el numero de zonas
Zona::setCantZonas($_SESSION['cantZonas']);
    
// Extraigo array
$zonas = unserialize($_SESSION['zonas']);

// Creo el articulo.
$zonaToAdd = new Zona($tipo, $aforo, $precio);

// Añado articulo al array
array_push($zonas, $zonaToAdd);

// Guardo el array en la sesion
$_SESSION['zonas'] = serialize($zonas);
// Guardo la nueva cantidad de articulos
$_SESSION['cantZonas'] = Zona::getCantZonas();

header("Location: index.php");
