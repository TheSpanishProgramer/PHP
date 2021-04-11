<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    for ($x = 1; $x < 11; $x++){
      $nota += $_GET['p'.$x];
    }
    ?>
     NOTA FINAL PROGRAMACION: <?php echo $nota?>/10 PUNTOS.<br>
  </body>
</html>
