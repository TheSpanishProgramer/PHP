<?php

function diaSemana($numero) {
    switch ($numero) {
        case 1:
            return "Es lunes";
            break;
        case 2:
            return "Es martes";
            break;
        case 3:
            return "Es miércoles";
            break;
        case 4:
            return "Es jueves";
            break;
        case 5:
            return "Es viernes";
            break;
        case 6:
            return "Es sábado";
            break;
        case 7:
            return "Es domingo";
            break;
        default:
            return "No es ningún día de la semana";
            break;
    }
}

require "ejercicio18.view.php";