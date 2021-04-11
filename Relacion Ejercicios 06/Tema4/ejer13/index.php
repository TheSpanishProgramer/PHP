<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
   
    <title></title>
  </head>
  <body>
      <p><b>13. Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
              son negativos.</b>
<?php
// Si es la primera vez
if(!(isset($_POST['numUser']))){
 $contador = 0;
 $contadorPos = 0;
 $contadorNeg = 0;
}
// Si el contador es inferior a 10
if(($_POST['contador'] < 10)){
    $contador += 1 + $_POST['contador'];
    $contadorPos = $_POST['contadorPos'];
    $contadorNeg = $_POST['contadorNeg'];
    if ($_POST['numUser'] >= 0){
            $contadorPos++;
    }else if($_POST['numUser'] < 0){
            $contadorNeg++;
    }
?> 
<form action="index.php" method="post">
    <input type="number" name="numUser" autofocus>
    <input type="hidden" name="contador" value="<?php echo $contador ;?>">
    <input type="hidden" name="contadorPos" value="<?php echo $contadorPos ;?>">
    <input type="hidden" name="contadorNeg" value="<?php echo $contadorNeg ;?>">
    <input type="submit" value="Continuar"
</form>
<?php
echo '<br>El numero de positivos es: ',$contadorPos-1;   
echo '<br>El numero de negativos es: ',$contadorNeg+0;
echo '<br>El contador es: ',$contador-1;

// Si el contador llega a 10. 
}else if ($_POST['contador'] == 10){
    $contadorPos = $_POST['contadorPos'];
    $contadorNeg = $_POST['contadorNeg'];
    echo '<br>El numero de positivos es: ',$contadorPos;   
    echo '<br>El numero de negativos es: ',$contadorNeg;   
}

?>

  </body>
</html>
