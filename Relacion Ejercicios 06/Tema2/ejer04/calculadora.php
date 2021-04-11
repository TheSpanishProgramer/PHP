<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $x = $_GET['x'];
    $y = $_GET['y'];
    
    $suma = $x + $y;
    $resta = $x - $y;
    $multiplicacion = $x * $y;
    $division = $x / $y;
    ?>
    VALORES: <?php echo $x,' y ',$y ?><br>
    SUMA:  <?php echo $suma;?><br>
    RESTA: <?php echo $resta;?><br>
    MULTIPLICACION:  <?php echo $multiplicacion;?><br>
    DIVISION:  <?php echo $division;?><br>
  </body>
</html>
