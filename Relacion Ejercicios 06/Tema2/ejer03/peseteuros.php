<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $ptas = $_GET['ptas'];
    $conversion = $ptas/ 167 ;
    ?>
    <?php echo $ptas ?> pesetas son <?php echo $conversion?> euros.
  </body>
</html>
