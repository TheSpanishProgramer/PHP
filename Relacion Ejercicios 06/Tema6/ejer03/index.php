
<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <p><b>3. Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones.

<?php
include('../funciones.php');

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

<form action="index.php" method="get">
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
?>
  </body>
</html>
