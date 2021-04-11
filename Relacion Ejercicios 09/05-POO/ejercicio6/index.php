<?php


function division($numero1, $numero2){
    if ($numero2 == 0) {
        throw new Exception("El parámetro no puede ser 0");
    } else {
        return $numero1/$numero2;
    }
}


echo division(5,2);
echo "<br>";
echo division(10,5);
echo "<br>";
echo division(3,0);

try {
    echo division(3,0);
}catch (Exception $e){
    echo "EXCEPCIÓN!! " . $e->getMessage();
}
