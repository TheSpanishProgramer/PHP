<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>13. Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendi-
dos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos.
<br>• Los numeros de las dos diagonales donde está el mínimo deben aparecer en color verde.
<br>• El mínimo debe aparecer en color azul.
<br>• El resto de números debe aparecer en color negro.</b>
<br><br>
   
<h2>Matriz Bidimensional Orginal</h2>
<?php
arrayBidiReal(100, 999, 6, 9);

function arrayRndSinRepetir($min, $max, $cantidad, &$arrayFinal) {
    // Meto x numeros min a max en array.
    $arrayNum = range($min, $max);
    
    // Mezcla el orden de los números dentro del array
    shuffle($arrayNum);
    // Corto el array por el numero indicado.
    $arrayFinal = array_slice($arrayNum, 0, $cantidad);
}
function arrayUnitoBidi($arrayFinal, $fil, $col, &$arrayBi,&$minimo, &$xMinimo, &$yMinimo){
  $i = 0;
  $minimo = 999;
  for ($x = 0; $x < $col; $x++) {
      for ($y = 0; $y < $fil; $y++) {
        $arrayBi[$x][$y] = $arrayFinal[$i];
        $i++;
        if ($arrayBi[$x][$y] < $minimo) {
          $minimo = $arrayBi[$x][$y];
          $xMinimo = $x;
          $yMinimo = $y;
        }
      }
  }
}
function arrayBidiImprimir($arrayBi, $fil, $col, $minimo, $xMinimo, $yMinimo){
echo "<table>";
  for ($x = 0; $x < $col; $x++) {
    echo "<tr>";
    for ($y = 0; $y < $fil; $y++) {
      if ($arrayBi[$x][$y] == $minimo) {
        echo '<td><span style="color: blue; font-weight:bold">'.$arrayBi[$x][$y].' </span></td>';
      } else if (abs((abs($x) - abs($xMinimo))) == abs((abs($y) - abs($yMinimo)))) {
        echo '<td><span style="color: green; font-weight:bold">'.$arrayBi[$x][$y].' </span></td>';
      } else {  
        echo '<td>'.$arrayBi[$x][$y].'</td>';
      }
    }
    echo "</tr>";  
  }
  echo "</table>";
}
function arrayBidiReal($min, $max, $fil, $col){

// 1. Crea array Unidimensional random
$cantidad = $fil*$col;
arrayRndSinRepetir($min, $max, $cantidad, $arrayFinal);

// 2. Convierte el array Unidimensional a Bidimensional
arrayUnitoBidi($arrayFinal, $fil, $col,$arrayBi,$minimo, $xMinimo, $yMinimo);

// 3. Imprime el array Bidimensional en tabla
arrayBidiImprimir($arrayBi, $fil, $col, $minimo, $xMinimo, $yMinimo);
        
}


?>
  
  </body>
</html>
