<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $subtotal = $_GET['subtotal'];
 
    ?>
    TOTAL SIN IVA: <?php echo $subtotal ?>€<br>
    TOTAL CON IVA: <?php echo $subtotal*1.21 ?>€<br>
  </body>
</html>
