<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>2. Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.</b>
<br>
   
<?php
  $numUser = $_GET['numUser'];
  $numeroText = $_GET['numeroText'];
  $cantNumeros = $_GET['cantNumeros'];

//Si no se ha mandado nada por numUser, declaraciones.
if (!isset($_GET['numUser'])){
  $cantNumeros = 0;
  $numeroText = "";
}
  
if ($cantNumeros == 10) {
  $numeroText = $numeroText . " " . $numUser;
  $numeroText = substr($numeroText, 2);                                       
  $arrayNum = explode(" ", $numeroText);
  
  
  
// HALLAR MINIMO Y MAXIMOS
  $maximo = -PHP_INT_MAX;
  $minimo = PHP_INT_MAX;
  
  foreach ($arrayNum as $n ){
    if ($n < $minimo){
      $minimo = $n;
    }
    if ($n > $maximo){
      $maximo = $n;
    }
  }
  
// MOSTRAR ARRAYS mio
  foreach ($arrayNum as $n){
    if ($n == $minimo){
      echo "$n  MINIMO <br>";
    }else if ($n == $maximo){
      echo "$n  MAXIMO <br>";
    }else{
    echo "$n <br>";
    }
  }

}
if ($cantNumeros < 10) {?>
<form action="index.php" method="get">
    <input type="number" name="numUser" autofocus>
    <input type="hidden" name="cantNumeros" value="<?= ++$cantNumeros ?>">
    <input type="hidden" name="numeroText" value="<?= $numeroText . " " . $numUser ?>">
    <input type="submit" value="Continuar">
</form>
<?php
}?>  
  
  </body>
</html>
