<?php
$valor = $_GET ["valor"];
for ($i = 1; $i <= $valor; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        print ($j.' ');
    }
    echo "</br>";
}
?>