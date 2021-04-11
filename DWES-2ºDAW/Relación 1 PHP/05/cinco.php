<?php

$numero = $_POST['inputDescom'];
    if ($numero < 1000) {
        echo 'El número introducido es menor de 1000';
    } else {
        echo '<br>El número '.$numero.' introducido descompuesto en base 10 es: ';

        // Casteo $numero a cadena
        $digitos = "$numero";
        // Obtengo cantidad dígitos del número introducido
        $numlength = mb_strlen($numero);
        // Creo una variable que pueda usar como potencia
        $restarElevado = $numlength;
        for ($i = 0; $i < $numlength; ++$i) {
            if ($restarElevado == 2) {
                echo "$digitos[$i]*10+";
                echo substr("$digitos", -1);
                break;
            } else {
                --$restarElevado;
                echo "$digitos[$i]*10^".$restarElevado.'+';
            }
        }
    }
