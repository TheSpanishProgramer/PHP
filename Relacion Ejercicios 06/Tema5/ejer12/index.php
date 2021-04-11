<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>9. Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
Al final se debe mostrar el array resultante.</b>
<br><br>
   
<h2>Prueba tu vocabulario en inglés</h2>
<?php
  $diccionario = array (
    "ordenador" => "computer",
    "gato" => "cat",      
    "rojo" => "red",
    "árbol" => "tree",
    "pingüino" => "penguin",
    "sol" => "sun",
    "agua" => "water",
    "viento" => "wind",
    "siesta" => "nap",
    "arriba" => "up",
    "ratón" => "mouse",
    "estadio" => "arena",
    "calumnia" => "aspersion",
    "aguacate" => "avocado",
    "cuerpo" => "body",
    "concurso" => "contest",
    "cena" => "dinner",
    "salida" => "exit",
    "lenteja" => "lentil",
    "cacerola" => "pan",
    "pastel" => "pie",
    "membrillo" => "quince"
  );

  if (!isset($_GET['espanol'])) {
    echo "Por favor, introduzca la traducción al inglés de las siguientes palabras.<br>";

    // Extrae las palabras españolas
    foreach ($diccionario as $clave => $valor) {
      $palabrasEspanolas[] = $clave;
    }

    arrayExtraeElementos($palabrasEspanolas, 5, $espanol);
    // Elige 5 palabras en español sin que se repita ninguna
//    $contadorPalabras = 0;
//    do {
//      $palabra = $palabrasEspanolas[rand(0, 19)];
//      if (!in_array($palabra, $espanol)) {
//        $espanol[] = $palabra;
//        $contadorPalabras++;
//      }
//    } while ($contadorPalabras < 5);

    echo '<form action="index.php" method="get">';
  
    for ($i = 0; $i < 5; $i++) {
      echo $espanol[$i]." ";
      echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
      echo '<input type="text" name="ingles['.$i.']" ><br>';
    }
    echo '<input type="submit" value="Aceptar">';
    echo '</form>';
    
  } else {
    $espanol = $_GET['espanol'];
    $ingles = $_GET['ingles'];

    for ($i = 0; $i < 5; $i++) {
      if ($diccionario[$espanol[$i]] == $ingles[$i]) {
        echo '<span style="color: green;">'.$espanol[$i].": ".$ingles[$i];
        echo " - correcto</span><br>";
      } else {
        echo '<span style="color: red;">'.$espanol[$i].": ".$ingles[$i];
        echo " - incorrecto</span>, la respuesta correcta es <b>".$diccionario[$espanol[$i]]."</b><br>";
      }
    }
  }
  function arrayExtraeElementos($array, $cantidadElmentos, &$arrayFinal){

// Mezcla el orden de los números dentro del array
    shuffle($array);
    // Corto el array por el numero indicado.
    $arrayFinal = array_slice($array, 0, $cantidadElmentos);
}

?>
  
  </body>
</html>
