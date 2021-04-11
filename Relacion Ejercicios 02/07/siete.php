<?php
$divisor = $_POST["numero"];
$total=0;

echo '<p>'.$divisor.' tiene los siguientes divisores: ';
    for($i = 1; $i <= $divisor; $i++) {
            if ($divisor % $i == 0) {
            	echo $i;
            	if ($i<$divisor) {
            	
            	echo ", ";
            	
            	}
				
				$total++;
            }
    }
	echo '<p>'.$divisor.' tiene un total de: '.$total.' divisores.';
?>