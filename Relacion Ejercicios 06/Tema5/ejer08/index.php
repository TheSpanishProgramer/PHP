<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>8. Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
el array resultante..</b>
<br><br>
   
<?php

  if (!isset($_GET['n'])) {
    $contadorNumeros = 1;
    $numeroTexto = "";
  } else {
    $contadorNumeros = $_GET['contadorNumeros'];
    $numeroTexto = $_GET['numeroTexto'];
  }
  
  if ($contadorNumeros < 11) {
    $contadorNumeros = $_GET['contadorNumeros'];
    $n = $_GET['n'];
    $numeroTexto = $_GET['numeroTexto'];

    if ($numeroTexto == "") {
        $numeroTexto = $n;
    } else {
        $numeroTexto = $numeroTexto.' '.$n;
    }
    
    $contadorNumeros++;
  }
  
  if (!isset($_GET['n']) || ($contadorNumeros < 11)) {
  ?>
    <form action="index.php" method="get">
      <input type="hidden" name="ejercicio" value="08">
      Introduzca un número:
      <input type="number" name ="n" autofocus="" required="">
      <input type="hidden" name="contadorNumeros" value="<?php echo $contadorNumeros; ?>">
      <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
      <input type="submit" value="OK">
    </form>
  <?php
  }
  
  ////////////////////////////////////////////////////////////////
  //  Programa principal una vez recogidos los datos del array.
  //  El array con los números es $numero
  ////////////////////////////////////////////////////////////////

  if ($contadorNumeros == 11) {
    $numero = explode(" ", $numeroTexto);
                             
    // Muestra el array original

    // Índice
    echo "Array original:<br>";
    echo "<table><tr>";
    for ($i = 0; $i < 10; $i++) {
      echo "<td>$i</td>";
    }
    echo "</tr>";

    // Contenido
    for ($i = 0; $i < 10; $i++) {
      echo "<td>".$numero[$i]."</td>";
    }
    echo "</tr></table>";
    
    //Saca primos
    arrayPrimos($numero, $primos, $noPrimos);
    // Une en array final
    arrayUnirDos($primos, $noPrimos, $numero, $numeroF);


    // Índice
    echo "<br>Array resultante con los primos al principio y los no primos al final:<br>";
    echo "<table><tr>";
    for ($i = 0; $i < 10; $i++) {
      echo "<td>$i</td>";
    }
    echo "</tr>";

    // Contenido
    for ($i = 0; $i < 10; $i++) {
      echo "<td>".$numeroF[$i]."</td>";
    }
    echo "</tr></table>";
  }
  
  
function arrayPrimos($arrayOrigen, &$arrayPrimo, &$arrayNoPrimo){
  
  for ($i = 0; $i < count($arrayOrigen); $i++) {
    $esPrimo = true;

    for ($j = 2; $j < $arrayOrigen[$i]; $j++) {
      if (($arrayOrigen[$i] % $j) == 0) {
          $esPrimo = false;
      }
    }

    if ($esPrimo) {
      $arrayPrimo[] = $arrayOrigen[$i];
    } else {
      $arrayNoPrimo[] = $arrayOrigen[$i];
    }
  }
  
}
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
