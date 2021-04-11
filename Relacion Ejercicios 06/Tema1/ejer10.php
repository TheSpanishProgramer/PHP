<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>10. Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos. La base de la
pirámide debe estar formada por 9 asteriscos. </b><br><br>
  <?php
  $altReal = 5;
  $linea = 1;
  $i = 0;
  $espacios = $altReal - 1;

  while($linea <= $altReal){
  // inserta espacios
    for ($i = 1; $i <= $espacios; $i++) {
    echo '&nbsp','&nbsp';
    }		
  // pinta la linea
    for ($i = 1; $i < $linea * 2; $i++) {
      out.print("*");
    }
    echo '<br>';      
    $linea++;
    $espacios--;
  }
  ?>
  </body>
</html>
