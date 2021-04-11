<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $euros = $_GET['euros'];
    $conversion = $euros* 167 ;
    ?>
    <?php echo $euros ?> euros son <?php echo $conversion?> pesetas.
  </body>
</html>
