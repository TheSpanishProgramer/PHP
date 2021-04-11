<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>5. Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
del diagrama se pueden dibujar a base de la concatenación de una imagen.</b>
<br><br>
   
<?php
$numeroMeses = 12;
// Si no ha mandado temperaturas
  if (!isset($_GET['temperatura'])) {
    // Array con nombre de los meses.
    $mes = array(
      "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    ?>
    Por favor, introduzca la temperatura media de cada mes.<br>
    <form action="index.php" method="get">
      <?php
      for ($i = 0; $i < $numeroMeses; $i++) {
        echo "$mes[$i]: <input type=\"number\" name =\"temperatura[$mes[$i]]\"><br>";
      }
      ?>
      <input type="submit" value="OK">
    </form>
    <?php                       
  } else {
    // Leer el array
    $temperatura = $_GET['temperatura'];
    
    // Imprimir array en tabla
    echo "<table>";
    foreach($temperatura as $mes => $temperaturaMes) {
      echo "<tr><td>$mes </td><td>";
      // Pinta la barra
      for ($i = 0; $i < $temperaturaMes; $i++) {
        echo "<img src=\"blue.png\" height=\"10\" width=\"10\">";
      }
      echo " $temperaturaMes"."ºC<br></td></tr>";
    }
    echo "</table>";
  }?>
  
  </body>
</html>
