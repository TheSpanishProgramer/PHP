<?php

$estudiantes = array(
    "Luis Scola" => [9, 8],
    "Pablo Prigioni" => [8, 4],
    "Sergi Vidal" => [7, 6],
    "Ramón Rivas" => [3.5, 6]
);

function generarFila($nombre, $nota1, $nota2)
{
    $notaMedia = round(($nota1+$nota2)/2,2);
    return "<tr>
        <td>{$nombre}</td>
        <td style='".calcularEstilo($nota1)."'>{$nota1}</td>
        <td style='".calcularEstilo($nota2)."'>{$nota2}</td>
        <td style='".calcularEstilo($notaMedia)."'>{$notaMedia}</td>
    </tr>";
}

// Utilizando esta función nos ahorramos todos los IF de la función anterior.
function calcularEstilo($nota) {
    if ($nota < 5) {
        return "color: red";
    }
    return "color:black";
}

function generarContenidoTabla($elementos) {
    $tablaHTML = "";
    foreach ($elementos as $nombre => $notas) {
        $tablaHTML .= generarFila($nombre, $notas[0], $notas[1]);
    }
    return $tablaHTML;
}

require "ejercicio32.view.php";