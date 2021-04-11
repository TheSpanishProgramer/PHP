<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>6. Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro..</b>
<br><br>
   
<?php
$numeros= 8;
// Si no ha mandado temperaturas
  if (!isset($_GET['numerosUsu'])) {
    
    ?>
    Introduzca ocho numero enteros<br>
    <form action="index.php" method="get">
      <?php
      for ($i = 0; $i < $numeros; $i++) {
        echo "NUMERO" ,$i+1,": <input type=\"number\" name =\"numerosUsu[$i]\"><br>";
      }
      ?>
      <input type="submit" value="OK">
    </form>
    <?php                       
  } else {
    // Leer el array
    $arrayNum = $_GET['numerosUsu'];
    //Mostrar array pintado
    foreach ($arrayNum as $value) {
      if ($value%2 == 0){
       echo "<span style=\"color: green; font-weight: bold;\">$value</span> ";
      }else{
        echo "<span style=\"color: blue; font-weight: bold;\">$value</span> ";
      }  
    }
  }
  ?>
  
  </body>
</html>
