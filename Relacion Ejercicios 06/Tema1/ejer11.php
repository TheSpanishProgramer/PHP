<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>10. Escribe un programa que pinte por pantalla una pirámide hueca a base de asteriscos. La base de la
pirámide debe estar formada por 9 asteriscos. </b><br><br>
    <?php
    $linea = 6;
    $posicion = 0;
    $huecos = 1;
    for($i = 1; $i < $linea; $i++){
      for ($v = 0; $v < ($linea - $posicion); $v++) {
        echo '&nbsp', '&nbsp';
      }
      echo '*';
      if (($posicion > 0) && ($posicion != $linea - 2)){                         //pinto huecos interiores y lado derecho
        for ($h = 0; $h < $huecos; $h++){ 
          echo '&nbsp','&nbsp';
        }
        echo '*','<br>';
      }else if ($posicion == ($linea - 2)) {
        for ($u = 0; $u < ($posicion * 2); $u++){
          echo '*';
        }
        echo '&nbsp', '&nbsp';
      } else {
        echo '<br>';
        }
      $posicion++;
      $huecos = ($posicion * 2 ) - 1;
    }
    ?>
  </body>
</html>
