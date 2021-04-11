<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>1. Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas..</b>
<br>
  <?php
 
  // DECLARO VARIABLES.
    $numero = new SplFixedArray(20); 
    $cuadrado = new SplFixedArray(20);
    $cubo = new SplFixedArray(20);
    
    for ($x = 0; $x < 20; $x++){
      $numero[$x] = rand(0, 100); 
    }
    
    for ($x = 0; $x < 20; $x++){
      $cuadrado[$x] = pow($numero[$x],2); 
    }

    for ($x = 0; $x < 20; $x++){
      $cubo[$x] = pow($numero[$x],3); 
    }
 ?>
<table border="2" style="border-collapse: collapse;">
  <tr>
    <th>INDICE</th>
    <th>NUMERO</th>
    <th>CUADRADO</th>
    <th>CUBO</th>   
  </tr>
  <?php 
  
  for ($filas = 0; $filas < 20; $filas++){
    echo "<tr>";
    
      echo "<td>";
      echo $filas;
      echo "</td>";
      
      echo "<td>";
      echo $numero[$filas];
      echo "</td>";
      
      echo "<td>";
      echo $cuadrado[$filas];
      echo "</td>";
      
      echo "<td>";
      echo $cubo[$filas];
      echo "</td>";
    
    echo "</tr>";  
  }
  
  ?>
  
  
</table>
  
  </body>
</html>
