<?php 

if(isset($_POST['a'])){ $a = $_POST['a']; } 
if(isset($_POST['b'])){ $b = $_POST['b']; } 
if(isset($_POST['c'])){ $c = $_POST['c']; }
if ($a == 0) {
    echo "A no puede ser 0";
    exit();
}
$r = $c - $b / $a;

echo "El resultado de la ecuacion: ".$a."x + ".$b." = ".$c." es: "."para el valor de x = ".$r;
?>