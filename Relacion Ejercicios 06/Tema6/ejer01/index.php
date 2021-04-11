
<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <p><b>1. Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.


<?php
include('../funciones.php');

// Recojo el numero introducido por el usuario
$numUser = $_GET['numUser'];

// Si no se ha mandado ningun numero o el numero es positivo
if ( !isset($numUser) || ($numUser > 0) ){
  $_SESSION['total'] += $numUser;                            // Guardo en sesion_total la suma de los numUser que lleguen.
  $_SESSION['contador']++;                                   // Guardo en sesion_contador la cantidad de numeros que lleguen.
?>

<form action="index.php" method="get">
  INTRODUCE UN NUMERO POSITIVO, CUANDO QUIERAS PARAR, UNO NEGATIVO:
  <input type="number" name="numUser" autofocus>
  <input type="submit" value="enviar">
</form>

<?php
}else{?>
  <p>RESULTADO FINAL DE LA MEDIA ES: <?= $_SESSION['total'] / ($_SESSION['contador']-1); ?></p> 
<?php session_destroy();
}
?>
  </body>
</html>
