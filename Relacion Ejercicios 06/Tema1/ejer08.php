<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>8. Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
almacenada en una variable. </b><br><br>
    <?php
    $euros = 25;
    $valorCambio = 167;
    $pesetas = $euros*$valorCambio;
    
    echo $euros, ' euros son ',$pesetas, ' pesetas.';
    ?>
  </body>
</html>
