<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      table,td,th{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
      } 
    </style>
  </head>
  <body>
    <b>4. Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
      íntegramente en HTML (igual que los ejercicios anteriores),<br> ve intercalando código HTML y PHP
para familiarizarte con éste último. </b><br><br>
    <?php
    echo '<table>';
      echo '<tr>';
        echo '<th>', 'LUNES','</th>';
        echo '<th>', 'MARTES','</th>';
        echo '<th>', 'MIERCOLES','</th>';
        echo '<th>', 'JUEVES','</th>';
        echo '<th>', 'VIERNES','</th>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'E.Servidor','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'E.Servidor','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'Interfaces Web','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'E.Servidor','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'E.Servidor','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'Interfaces Web','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'E.Servidor','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'E.Cliente','</td>';
        echo '<td>', 'Interfaces Web','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td colspan="5">','RECREO','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'Empresa','</td>';
        echo '<td>', 'AppWeb','</td>';
        echo '<td>', 'Ingles','</td>';
        echo '<td>', 'Empresa','</td>';
        echo '<td>', 'Interfaces Web','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'Interfaces Web','</td>';
        echo '<td>', 'AppWeb','</td>';
        echo '<td>', 'Ingles','</td>';
        echo '<td>', 'Empresa','</td>';
        echo '<td>', 'E.Servidor','</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td>', 'Interfaces Web','</td>';
        echo '<td>', 'AppWeb','</td>';
        echo '<td>', 'Ingles','</td>';
        echo '<td>', 'Empresa','</td>';
        echo '<td>', 'E.Servidor','</td>';
      echo '</tr>';
      
    echo '</table>';
    ?>
  </body>
</html>
