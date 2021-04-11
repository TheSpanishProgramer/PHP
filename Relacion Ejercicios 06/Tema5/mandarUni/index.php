<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>14. Rota a la derecha la matriz del ejercicio anterior.</b>
<br><br>
   
<h2>Matriz Unidimensional Original</h2>
<?php
arrayRndSinRepetir(100, 900, 20, $arrayFinal);
arrayImpr($arrayFinal);

preparaArrayEnvio($arrayFinal, $arraySalida);


?>

<form action="index.php" method="get">
  <input type="hidden" name="array2" value="<?php echo$arraySalida?>">
  <input type="submit"name="ok" value="mandar">
</form>

<h2>Matriz Unidimensional Enviada</h2>
<?php

if (isset($_GET['array2'])){
  
  recibeArrayEnvio($arraySalida, $arrayFinal);
  arrayImpr($arrayFinal);

}


function arrayRndSinRepetir($min, $max, $cantidad, &$arrayFinal) {
    // Meto x numeros min a max en array.
    $arrayNum = range($min, $max);
    
    // Mezcla el orden de los números dentro del array
    shuffle($arrayNum);
    // Corto el array por el numero indicado.
    $arrayFinal = array_slice($arrayNum, 0, $cantidad);
}
function arrayUnitoBidi($arrayUni, $fil, $col, &$arrayBi){
  $i = 0;
  for ($x = 0; $x < $col; $x++) {
      for ($y = 0; $y < $fil; $y++) {
        $arrayBi[$x][$y] = $arrayUni[$i];
        $i++; 
      }
  }
}
function arrayBidiImprimir($arrayBi, $fil, $col){
echo "<table>";
  for ($x = 0; $x < $col; $x++) {
    echo "<tr>";
    for ($y = 0; $y < $fil; $y++) {
      echo '<td>'.$arrayBi[$x][$y].'</td>';
    }
    echo "</tr>";  
  }
  echo "</table>";
}
function arrayBiRotar($arrayBi, &$arrayBiRotada){
  
  $ancho = count($arrayBi);
  $alto = count($arrayBi[0]);

  for ($i = 0; $i < $alto; ++$i) {
      for ($j = 0; $j < $ancho; ++$j) {
          $arrayBiRotada[$i][$j] = $arrayBi[$ancho - $j - 1][$i];
      }
  }
  return $arrayBiRotada;
}
function preparaArrayEnvio($array,&$arraySalida){
  $arraySalida = serialize($array);
  $arraySalida = urlencode($arraySalida);
}
function recibeArrayEnvio($array, &$arrayFinal){
  $arrayFinal = stripcslashes($array);
  $arrayFinal = urldecode($arrayFinal);
  $arrayFinal = unserialize($arrayFinal);
}
function arrayImpr($array){
  foreach ($array as $elemento) {
    echo $elemento, "<br>";
  }
}
?>
  
  </body>
</html>
