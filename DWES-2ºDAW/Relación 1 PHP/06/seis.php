<?php

$numerouno = $_POST['limiteuno'];
$numerodos = $_POST['limitedos'];
$resultado = $numerouno - $numerodos;
$absoluto = abs($resultado);
if ($absoluto < 100) {
    echo 'Debes introducir dos números con 99 cifras de diferencia';
    exit();
}
if ($numerouno < $numerodos) {
    echo 'Los múltiplos de 3 de la franja '.$numerouno.' y '.$numerodos.' son:<p>';
    for ($i = $numerouno = $_POST['limiteuno']; $i < $numerodos = $_POST['limitedos']; ++$i) {
        if ($i % 3 == 0) {
            echo $i.', ';
        }
    }
}
if ($numerouno > $numerodos) {
    echo 'Los múltiplos de 3 de la franja '.$numerodos.' y '.$numerouno.' son:<p>';
    for ($i = $numerodos = $_POST['limitedos']; $i < $numerouno = $_POST['limiteuno']; ++$i) {
        if ($i % 3 == 0) {
            echo $i.' es múltiplo de 3, ';
        }
    }
}
