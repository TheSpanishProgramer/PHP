<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>7. Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario.</b>
<br><br>
   
<?php

// ARRAY CON NUMEROS ALEATORIOS
for ($x = 0; $x < 20; $x++){
  $arrayOriginal[$x] = rand(0, 100); 
}

// NUMEROS IMPARES/PARES A ARRAYS
foreach ($arrayOriginal as $value) {
  if ($value%2 == 0){
   $arrayPares[] = $value;
  }else{
    $arrayImpares[] = $value;
  }  
}

arrayUnirDos($arrayPares, $arrayImpares, $arrayOriginal, $arrayFinal);



//// METER VALORES PARES AL INICIO DE ARRAYFINAL
//foreach ($arrayPares as $value) {
//  $arrayFinal[] = $value;      
//}
//// METER VALORES IMPARES EN LA CONTINUACION DEL ARRAYFINAL
//for  ($x = 0; $x < count($arrayOriginal)-count($arrayPares) ;$x++) {
//  $arrayFinal[$x+count($arrayPares)] = $arrayImpares[$x];      
//}
// MOSTRAR ARRAYS
?>
<table border="2" style="border-collapse: collapse; text-align: center">
  <tr>
    <th>[i]</th>
    <th>ARRAY ORIGINAL</th>
    <th>ARRAY PAR</th>
    <th>ARRAY IMPAR</th>
    <th>ARRAY FINAL</th>
  </tr>
  <?php 
  
  for ($filas = 0; $filas < count($arrayFinal); $filas++){
    echo "<tr>";
    
      echo "<td>";
      echo $filas;
      echo "</td>";

      echo "<td>";
      echo $arrayOriginal[$filas];
      echo "</td>";
      
      echo "<td>";
      echo $arrayPares[$filas];
      echo "</td>";
      
      echo "<td>";
      echo $arrayImpares[$filas];
      echo "</td>";
      
      echo "<td>";
      echo $arrayFinal[$filas];
      echo "</td>";

    echo "</tr>";  
  }
  
  ?>
</table>
<?php
function arrayUnirDos($array1, $array2, $arrayOrigen, &$arrayFinal){
  // Teniendo un array origen hago dos, Ej:uno para los pares y otro para los impares, esta funcion los une en orden.
  
  //Mete parte de un array en arayFinal
  foreach ($array1 as $value) {
    $arrayFinal[] = $value;      
  }
  
  //Une ambos arrays
  for  ($x = 0; $x < count($arrayOrigen)-count($array1) ;$x++) {
    $arrayFinal[$x+count($array1)] = $array2[$x];      
  }
}
?>
  
  </body>
</html>
