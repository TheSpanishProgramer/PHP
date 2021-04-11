<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <link href="hoja.css" rel="stylesheet" type="text/css">
    <title></title>
  </head>
  <body>
    <br><br>
<?php $passSecreta = 1234; ?>

<?php

//SI NO SE HA MANDADO NADA. (Si contador esta vacio)
if (!(isset($_POST['contador']))){
  $contador = 4;
  $passUser = 99999;                                                            //Ponemos 999999 para que sea diferente a passSecreta.

// SI SE HA ENVIADO ALGO
} else{
  $contador = $_POST['contador'];                                               //Cogemos informacion del contador y passUser.
  $passUser = $_POST['passUser'];
}

if ($passSecreta == $passUser) {?>
 <div id="mensajeFinalsi"> ACCESO GARANTIZADO</div><?php
}else if ($contador == 0){?>
 <div id="mensajeFinalno"> ACCESO DENEGADO</div><?php
}else{?>
 <div id="mensajeIntentos"> Te quedan <?php echo $contador ?> intentos.</div><?php 
  $contador--;
    echo '<form action="index.php" method="post">';
    echo '<input type="number" min=0 max=9999 name="passUser" autofocus placeholder=" - - - -">';
    echo '<input type="hidden" name="contador" value="', $contador, '">';
    echo '<input type="submit" value="ContinuarS">';
    echo '</form>';
}
?>

  </body>
</html>
