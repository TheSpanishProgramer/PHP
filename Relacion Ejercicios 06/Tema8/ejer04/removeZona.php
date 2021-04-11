<?php 
session_start();
require_once './Zona.php';
require_once './functions_Objects.php';

// Recibe datos de formulario y cantZonas de sesion
$tipo = $_GET['tipo'];
$_SESSION['cantZonas']--;
    
// Extraigo array
$zonas = unserialize($_SESSION['zonas']);

// Borro el objeto del array
$zonas = removeObject($zonas, "getTipo", $tipo);

// Guardo el array en la sesion
$_SESSION['zonas'] = serialize($zonas);
header("Location: index.php");

