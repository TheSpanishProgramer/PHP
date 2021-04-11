<?php

$numero = $_POST['inputNumPrimo'];
$contadorPrimo = 0;

for ($contador = 1; $contador <= $numero; ++$contador) {
    if ($numero % $contador == 0) {
        $contadorPrimo = $contadorPrimo + 1;
    }
}

if ($numero == 1 or $contadorPrimo == 2) {
    echo 'El número '.$numero.' es primo';
} else {
    echo 'El número '.$numero.' no es primo';
}
