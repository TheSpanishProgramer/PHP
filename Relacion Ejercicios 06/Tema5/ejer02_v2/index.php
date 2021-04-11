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
  $array = $_GET['array'];
  $cantNumeros = $_GET['cantNumeros'];

//Si no se ha mandado datos.
if (!isset($_GET['numUser'])){
  $cantNumeros = 0;
  $array = array();
  preparaArrayEnvio($array);
// Si ya se han mandado datos.
}else{
  anadirElemArray($array, $numUser);
}
  
if ($cantNumeros == 3) {
recibeArrayEnvio($array); 
  
// MOSTRAR ARRAYS mio
  foreach ($array as $n){
    echo "$n <br>";
  }

}
if ($cantNumeros < 3) {?>
<form action="index.php" method="get">
    <input type="number" name="numUser" autofocus>
    <input type="hidden" name="cantNumeros" value="<?= ++$cantNumeros ?>">
    <input type="hidden" name="array" value="<?= $array ?>">
    <input type="submit" value="Continuar">
</form>
<?php
}
// PREPARAR ARRAY PARA ENVIO. 
function preparaArrayEnvio(&$array){
  $array = serialize($array);
  $array = urlencode($array);
}
// RECIBIR ARRAY DE ENVIO
function recibeArrayEnvio(&$array){
  $array = stripcslashes($array);
  $array = urldecode($array);
  $array = unserialize($array);
}
function anadirElemArray(&$array, $valor){
    // string > array
  recibeArrayEnvio($array);
  // Añade numero al array
  array_push($array, $valor);
  // array > string
  preparaArrayEnvio($array);
}
?>  
  
  </body>
</html>
