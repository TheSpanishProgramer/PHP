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
   
<?php
  if (isset($_GET['palabra'])) {
    $palabra = $_GET['palabra'];

    $diccionario = array (
      "ordenador" => "computer",
      "gato" => "cat",      
      "rojo" => "red",
      "árbol" => "tree",
      "pingüino" => "penguin",
      "sol" => "sun",
      "agua" => "water",
      "viento" => "wind",
      "siesta" => "siesta",
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


    creaDiccionario($diccionario, $palabrasEspanolas);
    buscaDiccionario($palabra, $palabrasEspanolas, $diccionario);
    
  }
function creaDiccionario($array, &$diccionario){
 foreach ($array as $clave => $valor) {
     $diccionario[] = $clave;
   }
} 
function buscaDiccionario($palabra, $array, $diccionario){
  if (in_array($palabra, $array)) {
      echo "<b>$palabra</b> en inglés es <b>".$diccionario[$palabra]."</b><br><br>";
    } else {
      echo "Lo siento, no conozco esa palabra.<br><br>";
    }
}
  
?>
<form action="index.php" method="get">
  <input type="hidden" name="ejercicio" value="11">
  Palabra en español : <input type="text" name ="palabra" autofocus="" required="">
  <input type="submit" value="OK">
</form>
  
  </body>
</html>
