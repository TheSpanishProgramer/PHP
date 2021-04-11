<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>9. Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
almacenada en una variable. </b><br><br>
    <?php
    $pesetas = 333;
    $valorCambio = 166;
    $euros = $pesetas/$valorCambio;
    
    echo $pesetas, ' pesetas son ',$euros, ' euros.';
    ?>
  </body>
</html>
