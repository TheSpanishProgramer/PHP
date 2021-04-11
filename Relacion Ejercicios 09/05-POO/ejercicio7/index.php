<?php
include "Models/Cuadrado.php";

$cuadrado1 = new \Ejercicio7\Models\Cuadrado("rojo", 20, 5);

try {
    echo $cuadrado1->area();
}catch (Exception $e){
    echo "EXCEPCIÓN!! " . $e->getMessage();
}
