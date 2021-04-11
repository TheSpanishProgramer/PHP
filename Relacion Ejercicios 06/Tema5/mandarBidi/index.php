<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>14. Rota a la derecha la matriz del ejercicio anterior.</b>
<br><br>
   
<h2>Matriz Bidimensional Original</h2>
<?php

include('../funciones.php');
//arrayRndSinRepetir(100, 900, 144, $arrayFinal);
arrayRndSinRepetir(100, 900, 144, $arrayFinal);
arrayUnitoBidi($arrayFinal, 12, 12, $arrayBi);
arrayBidiImprimir($arrayBi, 12, 12);

preparaArrayEnvio($arrayBi);


?>

<form action="index.php" method="get">
  <input type="hidden" name="arrayBi2" value="<?php echo$arrayBi?>">
  <input type="submit"name="ok" value="mandar">
</form>

<h2>Matriz Bidimensional Enviada</h2>
<?php

if (isset($_GET['arrayBi2'])){
  
  recibeArrayEnvio($arrayBi);
  arrayBidiImprimir($arrayBi, 12, 12);
  sumaFilasArray($arrayBi);
}

?>
  
  </body>
</html>
