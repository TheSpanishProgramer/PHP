
<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <p><b>4. Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos.<br>

<?php

// SI EL USUARIO ESTA LOGUEADO
if ($_SESSION['logueado']){
  ////////// PROGRAMA \\\\\\\\\\

  // Recojo el numero introducido por el usuario
  $numUser = $_GET['numUser'];

  // ALIAS
  $sContador =& $_SESSION['contador'];
  $sSumaNumeros =& $_SESSION['suma'];

  // Si no se ha mandado ningun numero o la suma de introducidos es inferior a 10000
  if ( !isset($numUser) || ($sSumaNumeros + $numUser < 10000) ){
    $sContador++;                                   
    $sSumaNumeros += $numUser;

  ?>

  <form action="#" method="get">
    INTRRODUCE NUMEROS. VERAS ESTO MIENTRAS LA SUMA SEA INFERIOR A 10.000
    <input type="number" name="numUser" autofocus>
    <input type="submit" value="enviar">
  </form>

  <?php
  echo "<br>la suma de numeros es: "+$sSumaNumeros;
  // Sino, hacer operacion y mostrar.
  }else{

    // Media de los numeros
    $media = $sSumaNumeros/$sContador;

  ?>
    <p>TOTAL ACUMULADO: <?= $sSumaNumeros; ?> </p>
    <p>CANTIDAD DE NUMEROS: <?= $sContador-1; ?></p> 
    <p>MEDIA NUMEROS: <?= $media; ?></p> 

  <?php session_destroy();
  }
  ////////// FIN PROGRAMA \\\\\\\\\\

// SI NO ESTA LOGUEADO VOLVER ATRAS.
}else{
  echo "Debes estar logueado para ver esta pagina";
  header('Refresh: 3; url=index.php');
}
?>
  </body>
</html>
