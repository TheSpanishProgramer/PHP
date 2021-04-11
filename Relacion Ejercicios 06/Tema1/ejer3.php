<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>3. Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
      traducción al castellano. Las palabras deben estar distribuidas en dos columnas.<br> Utiliza la etiqueta
table de HTML. </b><br><br>
    <?php
    echo '<table border="1">';
      echo '<tr>';
        echo '<th>', 'INGLES','</th>';
        echo '<th>', 'ESPAÑOL','</th>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'dog','</td>';
        echo '<td>', 'perro','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'cat','</td>';
        echo '<td>', 'gato','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'mouse','</td>';
        echo '<td>', 'raton','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'rabbit','</td>';
        echo '<td>', 'conejo','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'fish','</td>';
        echo '<td>', 'pez','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'bird','</td>';
        echo '<td>', 'pajaro','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'snake','</td>';
        echo '<td>', 'serpiente','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'eagle','</td>';
        echo '<td>', 'aguila','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'spider','</td>';
        echo '<td>', 'araña','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'fly','</td>';
        echo '<td>', 'mosca','</td>';
      echo '</tr>';
      
    echo '</table>';
    ?>
  </body>
</html>
