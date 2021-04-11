<?php 

if(isset($_POST['a'])){ $a = $_POST['a']; } 
if(isset($_POST['b'])){ $b = $_POST['b']; } 
if(isset($_POST['c'])){ $c = $_POST['c']; }

$d = $b*$b - 4*$a*$c;

if($d < 0) {
    echo "No tiene solución";
} else if($d == 0) {
    echo "La solución es ".(-$b / 2*$a);
} else  {
    echo "Las soluciones son".((-$b + sqrt($d)) / (2*$a))." y ".((-$b - sqrt($d)) / (2*$a));
}
?>