<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php $hora = $_GET['hora']; ?>
    <?php
    if (($hora > 5)&&($hora < 13)){
      echo "Buenos dias!";
    }
    if (($hora > 12)&&($hora < 21)){
      echo "Buenas tardes!";
    }
    if (($hora > 20)||($hora < 6)){
      echo "Buenas noches!";
    }
    ?> 
  </body>
</html>
