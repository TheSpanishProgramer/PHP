<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $radio = $_GET['radio'];
    $altura = $_GET['altura'];
    $volumenCono = (pi()* pow($radio, 2)*$altura)/3;
    ?>
    Volumen del cono: <?php echo $volumenCono ?><br>
  </body>
</html>
