<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
   
    <title></title>
  </head>
  <body>
      <p><b>16. Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.</b>

<form action="index.php" method="post">
    <input type="number" name="numUser" autofocus>
    <input type="submit" value="Continuar"
</form>
 <?php 
$primo = TRUE;
// Si se han mandado datos
if(isset($_POST['numUser'])){

$numUser = $_POST['numUser'];
    for ($x = 2; $x < $numUser; $x++){
        if (($numUser % $x) == 0){
            $primo = FALSE;
        }  
    }
    if ($primo){
        echo 'El numero  es primo';
    }else{
        echo 'El numero no es primo';
    }    
}
 
 
 ?>


  </body>
</html>
