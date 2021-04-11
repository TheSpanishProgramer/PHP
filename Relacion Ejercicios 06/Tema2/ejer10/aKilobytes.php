<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $megas = $_GET['megas'];
    ?>
     <?php echo $megas ?> megabytes son: <?php echo $megas*1024 ?> kilobytes<br>
  </body>
</html>
