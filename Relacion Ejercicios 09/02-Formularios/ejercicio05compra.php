<?php
/*** DATOS ***/
require 'ejercicio05-datos.php';

/*** FUNCIONES ***/
function calcularImporte($productos){
    $total = 0;
    foreach ($productos as $id => $producto){
        if (isset($_GET[$id])) {
            $total = $total + $producto["precio"]*$_GET[$id];
        }
    }
    return $total;
}

// Cargar la vista
require 'ejercicio05compra.view.php';