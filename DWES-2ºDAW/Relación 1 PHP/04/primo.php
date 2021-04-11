<?php

$numero = $_POST['inputNumPrimo'];
$contadorPrimo = 0;

if ($numero > 999) {
    echo '<br>Los primeros '.$numero.' numeros primos son: ';
    for ($contador = 1; $contador <= $numero; ++$contador) {
        if (primo($contador) && $contador < $numero) {
            echo '<br>'.$contador.'';
        }
    }
} else {
    echo '<br>El numero que ha introducido es menor de 1000, introduzca un valor menor. ';
}

    /**
     * Función que determina si un numero es primo
     * Tiene que recibir el numero a determinar si es primo o no
     * Devuelve True o False.
     */
    function primo($num)
    {
        if ($num == 2 || $num == 3 || $num == 5 || $num == 7) {
            return true;
        } else {
            // comprobamos si es par
            if ($num % 2 != 0) {
                // comprobamos solo por los impares
                for ($i = 3; $i <= sqrt($num); $i += 2) {
                    if ($num % $i == 0) {
                        return false;
                    }
                }

                return true;
            }
        }

        return false;
    }
