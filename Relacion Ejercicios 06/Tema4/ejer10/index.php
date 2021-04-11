<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
   
    <title></title>
  </head>
  <body>
      <p><b>10. Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. 
El usuario indicará que ha erminado de introducir los datos cuando meta un número negativo.


<?php
// Si el numero introducido es positivo o es la primera vez.
if (($_POST['numUser'] > 0)||(!(isset($_POST['numUser'])))){   
  
    $numUser = $_POST['numUser'];
    $suma = $numUser + $_POST['suma'];
    $contador = 1 + $_POST['contador'];
    echo '<br><br>La suma es ', $suma;
    echo '<br><br>La cantidad de numeros es ', $contador-1;
?> 
<form action="index.php" method="post">
    <input type="number" name="numUser" autofocus>
    <input type="hidden" name="suma" value="<?php echo $suma ;?>">
    <input type="hidden" name="contador" value="<?php echo $contador ;?>">
    <input type="submit" value="Continuar"
</form>

<?php }

// Si el numero introducido por usuario es negativo
if ($_POST['numUser'] < 0){

$suma = $_POST['suma'];
$contador = $_POST['contador']-1;
$media = $suma / $contador;

echo '<br><br>La media es ', $media;
}

?>

  </body>
</html>
