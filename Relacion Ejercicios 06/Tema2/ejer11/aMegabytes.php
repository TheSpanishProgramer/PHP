<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $kilobytes = $_GET['kilobytes'];
    $conversion = $kilobytes/1024;
    ?>
     <?php echo kilobytes ?> kilobytes son: <?php echo round($conversion,1) ?> megabytes<br>
  </body>
  <!-- round($conversion,1) es una funcion que redondea, en este caso con 1 decimal-->
</html>
