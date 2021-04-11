<?php

for ($ciclo = 3; $ciclo <= 3; ++$ciclo) {
    echo '<table border=1 align=center width=15% style=border-collapse:collapse>';
    echo '<tr align=center><td colspan=5><b>Tabla de multiplicar del '.$ciclo.'</b></td></tr>';

    for ($ciclo2 = 1; $ciclo2 <= 10; ++$ciclo2) {
        if ($ciclo2 % 2 == 0) {
            $mult = $ciclo * $ciclo2;
            echo "<tr align=center style='background-color:#0f0'><td>".$ciclo.'</td><td> X </td><td>'.$ciclo2.'</td><td> = </td><td>'.$mult.'</td></tr>';
        } else {
            $mult = $ciclo * $ciclo2;
            echo '<tr align=center><td>'.$ciclo.'</td><td> X </td><td>'.$ciclo2.'</td><td> = </td><td>'.$mult.'</td></tr>';
        }
    }
    echo '</table>';
}
