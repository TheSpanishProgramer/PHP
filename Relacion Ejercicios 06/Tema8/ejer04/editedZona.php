<?php 
session_start();
require_once './Zona.php';
require_once './functions_Objects.php';

// Recibe datos de formulario
$tipo = $_POST['tipo'];
$aforo = $_POST['aforo'];
$precio = $_POST['precio'];

// Extraigo array
$zonas = unserialize($_SESSION['zonas']);

// Busco el objeto en el array
$objetoEditar = findObject($zonas, "getTipo", $tipo);

// Edito el objeto
$objetoEditar->setTipo($tipo);
$objetoEditar->setNumEntradas($aforo);
$objetoEditar->setPrecio($precio);


// Guardo el array en la sesion
$_SESSION['zonas'] = serialize($zonas);

header("Location: index.php");