  <?php
/* Paquete de funciones para arrays uni-bidimensionales.
 * Autor: Julian Garcia Castillo.
 */

// ARRAYS UNIDIMENSIONALES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//=============================================================================
//=============================================================================

// FUNCION IMPRIMIR ARRAY
function arrayImpr($array){
  foreach ($array as $elemento) {
    echo $elemento, "<br>";
  }
}
// FUNCION IMPRIMIR ARRAY EN LINEA
function arrayImprLinea($array){
  foreach ($array as $elemento) {
    echo $elemento, " ";
  }
}

// FUNCION IMPRIMIR 3 ARRAY TABLA
function array3col($array1, $array2, $array3) {
  ?>
  <table border="2" style="border-collapse: collapse; text-align: center;">
    <tr>
      <th>[i]</th>
      <th>ARRAY 1</th>
      <th>ARRAY 2</th> 
      <th>ARRAY 3</th> 
    </tr>
  <?php
    
  for ($filas = 0; $filas < count($array1); $filas++){
   echo "<tr>";
  //COLUMNA INDICES
    echo "<td>";
    echo $filas;
    echo "</td>";
  //COLUMNA ARRAY1  
    echo "<td>";
    echo $array1[$filas];
    echo "</td>";
  //COLUMNA ARRAY2  
    echo "<td>";
    echo $array2[$filas];
    echo "</td>";
  //COLUMNA ARRAY3
    echo "<td>";
    echo $array3[$filas];
    echo "</td>";

  echo "</tr>"; 
  }
  echo "</table>";
}

// FUNCION IMPRIMIR 2 ARRAY TABLA
function array2col($array1, $array2) {
?>
<table border="2" style="border-collapse: collapse; text-align: center;">
  <tr>
    <th>[i]</th>
    <th>ARRAY ORIGINAL</th>
    <th>ARRAY CAMBIADO</th> 
  </tr>
<?php
    
  for ($filas = 0; $filas < count($array1); $filas++){
   echo "<tr>";
  //COLUMNA INDICES
    echo "<td>";
    echo $filas;
    echo "</td>";
  //COLUMNA ARRAY1  
    echo "<td>";
    echo $array1[$filas];
    echo "</td>";
  //COLUMNA ARRAY2  
    echo "<td>";
    echo $array2[$filas];
    echo "</td>";

  echo "</tr>"; 
  }
  echo "</table>";
}

// FUNCION IMPRIMIR 1 ARRAY TABLA
function array1col($array) {
?>
<table border="2" style="border-collapse: collapse; text-align: center;">
  <tr>
    <th>[i]</th>
    <th>ARRAY ORIGINAL</th>
  </tr>
<?php
    
  for ($filas = 0; $filas < count($array); $filas++){
   echo "<tr>";
  //COLUMNA INDICES
    echo "<td>";
    echo $filas;
    echo "</td>";
  //COLUMNA ARRAY1  
    echo "<td>";
    echo $array[$filas];
    echo "</td>";

  echo "</tr>"; 
  }
  echo "</table>";
}

// FUNCION LLENA ARRAY DE RANDOM. Devuelve arrayRandom
function arrayRnd($array, $cantNumeros, $min, $max){
  for ($x = 0; $x < $cantNumeros; $x++){
      $array[$x] = rand($min, $max); 
    }
    return $array;
}

// FUNCION ARRAY IMPRIMIR MIN Y MAXIMO. 
function arrayImpriMinMax($array){
  $maximo = -PHP_INT_MAX;
  $minimo = PHP_INT_MAX;
  
  foreach ($array as $n ){
    if ($n < $minimo){
      $minimo = $n;
    }
    if ($n > $maximo){
      $maximo = $n;
    }
  }
  
// MOSTRAR ARRAYS mio
  foreach ($array as $n){
    if ($n == $minimo){
      echo "$n  MINIMO <br>";
    }else if ($n == $maximo){
      echo "$n  MAXIMO <br>";
    }else{
    echo "$n <br>";
    }
  }
}

// FUNCION HALLAR MIN Y MAXIMO. Devuelve minimo y maximo.
function arrayMinMax($array, &$minimo, &$maximo){
  $maximo = -PHP_INT_MAX;
  $minimo = PHP_INT_MAX;
  
  foreach ($array as $n ){
    if ($n < $minimo){
      $minimo = $n;
    }
    if ($n > $maximo){
      $maximo = $n;
    }
  }
}
// FUNCION HALLAR SOLO MINIMO. Devuelve minimo.
function arrayMin($array, &$minimo){
  
  $minimo = PHP_INT_MAX;
  
  foreach ($array as $n ){
    if ($n < $minimo){
      $minimo = $n;
    }
  }
}
// FUNCION HALLAR SOLO MAXIMO. Devuelve maximo.
function arrayMax($array, &$maximo){
  
  $maximo = -PHP_INT_MAX;
  
  foreach ($array as $n ){
    if ($n > $maximo){
      $maximo = $n;
    }
  }
}

// FUNCION EXPLODE. Devuelve arrayFinal.
function arrayExplode($numeroText, $numUsuario, &$arrayFinal){
  $numeroText = $numeroText . " " . $numUsuario;
  $numeroText = substr($numeroText, 2);                                       
  $arrayFinal = explode(" ", $numeroText);
  return $arrayFinal;
}

// FUNCION IMPLODE. Devuelve String.
function arrayImplode($array, &$cadenaTexto){
  $cadenaTexto = implode(" ", $array);
  return $cadenaTexto;
}

// ROTAR ARRAY DERECHA. Devuelve array rotado.
function rotaArrayDcha(&$array,$veces){
  $numeroRotaciones = count($array)- $veces;
  while ($y < $numeroRotaciones){
    array_push($array,array_shift($array));
    $y++;
  }
}

// ROTAR ARRAY IZQ. Devuelve array rotado.
function rotaArrayIzq(&$array,$veces){
  while ($y < $veces){
    array_push($array,array_shift($array));
    $y++;
  }
}

// BUSCA 1 ELEMENTO EN ARRAY Y PINTALO. Devuelve el array pintado
function arrayPintaElemento($array, $elemento, $color){
  foreach ($array as $n) {
      if ($n == $elemento) { 
        echo "<span style=\"color: $color; font-weight: bold;\">$elemento</span> ";
      } else {
        echo  "$n ";
      }
    }
}

// BUSCA 2 ELEMENTOs EN ARRAY Y PINTALOS. Devuelve el array pintado
function arrayPintaDosElementos($array, $elemento1, $color1,$elemento2, $color2){
  foreach ($array as $n) {
      if ($n == $elemento1) { 
        echo "<span style=\"color: $color1; font-weight: bold;\">$elemento1</span> ";
      }
      if ($n == $elemento2) { 
        echo "<span style=\"color: $color2; font-weight: bold;\">$elemento2</span> ";
      } else {
        echo  "$n ";
      }
    }
}

// UNIR DOS ARRAYS. Devuelve un arrayFinal
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

// HALLAR PRIMOS ARRAY. Devuelve arrayPrimo y arrayNoPrimo
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

// CAMBIAR DE ARRAY UNA POSICION POR OTRA
function rotaArrayPosiciones(&$array,$pos1, $pos2){
  // Rotación

      // Primer tramo
  $ultimoNumArray = count($array)-1;
      $auxiliar = $array[$ultimoNumArray];
      for ($i = $ultimoNumArray; $i > $pos2; $i--) {
        $array[$i] = $array[$i - 1];
      }
      $array[$pos2] = $array[$pos1];

      // Segundo tramo
      for ($i = $pos1; $i > 0; $i--) {
        $array[$i] = $array[$i - 1];
      }
      $array[0] = $auxiliar;
}

//  ARRAY UNI RANDOM SIN REPETICIONES.Devuelve arrayFinal
function arrayRndSinRepetir($min, $max, $cantidad, &$arrayFinal) {
    // Meto x numeros min a max en array.
    $arrayNum = range($min, $max);
    
    // Mezcla el orden de los números dentro del array
    shuffle($arrayNum);
    // Corto el array por el numero indicado.
    $arrayFinal = array_slice($arrayNum, 0, $cantidad);
}

//  CREAR DICCIONARIO. Entra el array de traducciones, y sale el diccionario.
function creaDiccionario($array, &$diccionario){
  foreach ($array as $clave => $valor) {
    $diccionario[] = $clave;
  }
}

// BUSCAR EN DICCIONARIO. Busca palabra en diccionario, si la encuentra la devuelve por el array.
function buscaDiccionario($palabra, $diccionario, $array){
  if (in_array($palabra, $diccionario)) {
      echo "<b>$palabra</b> en inglés es <b>".$array[$palabra]."</b><br><br>";
    } else {
      echo "Lo siento, no conozco esa palabra.<br><br>";
    }
}

// EXTRAER X VALORES RANDOM DE ARRAY SIN REPETIR.
function arrayExtraeElementos($array, $cantidadElmentos, &$arrayFinal){

// Mezcla el orden de los números dentro del array
    shuffle($array);
    // Corto el array por el numero indicado.
    $arrayFinal = array_slice($array, 0, $cantidadElmentos);
}

// ARRAYS BIDIMENSIONALES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//=============================================================================
//=============================================================================


// ARRAY UNI EN ARRAY BIDI
function arrayUnitoBidi($arrayUni, $fil, $col, &$arrayBi){
  $i = 0;
  for ($x = 0; $x < $col; $x++) {
      for ($y = 0; $y < $fil; $y++) {
        $arrayBi[$x][$y] = $arrayUni[$i];
        $i++; 
      }
  }
}

// IMPRIMR ARRAYBIDI
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

// CREAR  E IMPRIME ARRAY BIDIMENSIONAL
function arrayBidiReal($min, $max, $fil, $col){

// 1. Crea array Unidimensional random
$cantidad = $fil*$col;
arrayRndSinRepetir($min, $max, $cantidad, $arrayFinal);

// 2. Convierte el array Unidimensional a Bidimensional
arrayUnitoBidi($arrayFinal, $fil, $col, $arrayBi);

// 3. Imprime el array Bidimensional en tabla
arrayBidiImprimir($arrayBi, $fil, $col);
        
}
    // AÑADIDO: HALLAR MINIMO Y COLOREAR DIAGONALES
    function arrayUnitoBidiMIN($arrayFinal, $fil, $col, &$arrayBi,&$minimo, &$xMinimo, &$yMinimo){
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
    function arrayBidiImprimirMIN($arrayBi, $fil, $col, $minimo, $xMinimo, $yMinimo){
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

// ROTAR MATRIZ BIDI DERECHA
function arrayBiRotarDcha($arrayBi, &$arrayBiRotada){
 
    
    $ancho = count($arrayBi);
    $alto = count($arrayBi[0]);
    
    for ($i = 0; $i < $alto; ++$i) {
        for ($j = 0; $j < $ancho; ++$j) {
            $arrayBiRotada[$i][$j] = $arrayBi[$ancho - $j - 1][$i];
        }
    }
    return $arrayBiRotada;
}

// ROTAR MATRIZ BIDI IZQUIERDA
function arrayBiRotarIzq($arrayBi, &$arrayBiRotada3){
  arrayBiRotar($arrayBi, $arrayBiRotada);
  arrayBiRotar($arrayBiRotada, $arrayBiRotada2);
  arrayBiRotar($arrayBiRotada2, $arrayBiRotada3);
}

// PREPARAR ARRAY PARA ENVIO. 
function preparaArrayEnvio(&$array){
  $array = serialize($array);
  $array = urlencode($array);
}

// PREPARAR ARRAY PARA ENVIO. DIFERENTE SALIDA 
function preparaArrayEnviov2($array, &$arraySalida){
  $arraySalida = serialize($array);
  $arraySalida = urlencode($array);
}

// RECIBIR ARRAY DE ENVIO
function recibeArrayEnvio(&$array){
  $array = stripcslashes($array);
  $array = urldecode($array);
  $array = unserialize($array);
}

// AÑADIR VALOR AL ARRAY (VALOR VIENE DE FORMULARIO). Dado un array, se le añade el numero introducido por el usuario.
function anadirElemArray(&$array, $valor){
  // string > array
  recibeArrayEnvio($array);
  // Añade numero al array
  array_push($array, $valor);
  // array > string
  preparaArrayEnvio($array);
}

// SUMAR FILAS ARRAY BIDI. IMPRIME
function sumaFilasArray($array){
  $suma = 0;
  for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array); $j++) {
      $suma += $array[$i][$j];              
    }
      echo "Fila ", $i, " = ", $suma;
      echo "<br>"; 
      $suma = 0;
  }
}

// SUMAR COLUMNAS ARRAY BIDI. IMPRIME
function sumaColumnasArray($array){
  $suma = 0;
  for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array); $j++) {
      $suma += $array[$j][$i];              
    }
      echo "Columna ", $i, " = ", $suma;
      echo "<br>";  
      $suma = 0;
  }
}

// COOKIES Y ARRAYS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//=============================================================================
//=============================================================================

// RECIBIR ARRAY DE COOKIE Y CONVERTIRLA A ARRAY REAL.
function cookieRecibeArray($nombreCookie, &$arraySalida){
  $arraySalida = $_COOKIE[$nombreCookie];
  $arraySalida = stripslashes($arraySalida);    	
  $arraySalida = unserialize($arraySalida);
}
// COMPRIMIR ARRAY > STRING Y GUARDAR EN COOKIE
function cookieArrayToCookie($array, $nombreCookie){
  setcookie($nombreCookie, serialize($array), time() + 3*24*3600);
}
// DESCOMPRIMIR STRING > ARRAY
function cookieStringToArray(&$string){
  $string = unserialize($string);
}

// ARRAYS ASOCIATIVOS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//=============================================================================
//=============================================================================

//ZONA ADMINISTRADOR (EJEMPLO, ALTA() y COOKIEARRAYTOCOOKIE() )
function alta(&$array, $codigo, $nombre, $precio, $imagen){
    $array[$codigo] = array ("titulo" => $nombre, "precio" => $precio, "imagen" => $imagen);  
  }
  function baja(&$array, $codigo){
    unset($array[$codigo]);
  }
  function modificacion(&$array, $codigo, $nombre, $precio, $imagen){
    $array[$codigo] = array ("titulo" => $nombre, "precio" => $precio, "imagen" => $imagen);  
  }