<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>4. Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.</b>
<br><br>
   
<?php

if (!isset($_GET['numeroText'])){
//Generar array random
  for ($x = 0; $x < 20; $x++){
        $numero[$x] = rand(0, 100); 
    }
  //Mostrar array con espacios
  echo "Array Original <br>";
  foreach ($numero as $elemento) {
    echo $elemento, " ";
  }
  
  //Convertir de array a String, para enviarlo
  $numeroText = implode(" ", $numero);
?>

<br><br>Introduce numeros a resaltar: 
<form action="index.php" method="get">
    <input type="number" name="numUser1" autofocus> por el
    <input type="number" name="numUser2">
    <input type="hidden" name="numeroText" value="<?= $numeroText ?>">
    <input type="submit" value="Continuar">
</form>
<?php }else{
  
// Convertir de string a array
  $numero1 = $_GET['numUser1'];
  $numero2 = $_GET['numUser2'];
  
  $numeroText = $_GET['numeroText'];
  $numero = explode(" ", $numeroText);

  //Buscar si aparece los numeros
  foreach ($numero as $n) {
      if ($n == $numero1) { 
        echo "<span style=\"color: green; font-weight: bold;\">$numero2</span> ";
      } else {
        echo  "$n ";
      }
    }
 
}

?>
  
  </body>
</html>
