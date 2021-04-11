<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
    $determinante = (pow($b,2) - 4 *$a * $c);
    
    // a = 0, b = 0, c = 0
    if (($a == 0) && ($b == 0) && ($c == 0)) {
      echo "Infinitas soluciones cuando todos los valores son 0.";
    }
    
    // a = 0, b = 0
    if (($a == 0) && ($b == 0) && ($c != 0)) {
      echo "No hay solucion cuando sólo c es distinto de 0.";
    }
    
    // c = 0
    if (($a != 0) && ($b != 0) && ($c == 0)) {
      echo "x1 es 0", "<br>";
      echo "x2 es ", (-$b / $a);
    }
    
    // a = 0
    if (($a == 0) && ($b != 0) && ($c != 0)) {
      echo "x1 y x2 es: ",(-$c / $b);
    }
    
    // b = 0, con c < 0
    if (($a != 0) && ($b == 0) && ($c < 0)) {
      $solucion = sqrt(-$c / $a);
      echo "x1 es : ",($solucion), "<br>";
      echo "x2 es : ",(-$solucion);
    }
    // b = 0, con c > 0
    if (($a != 0) && ($b == 0) && ($c > 0)) {
      $solucion = sqrt($c / $a);
      echo "No tiene solucion porque no existe la raiz de un numero negativo";
    }
    
    // Todos distintos de cero
    if (($a != 0) && ($b != 0) && ($c != 0)) {
      if ($determinante < 0 ){
        echo "La ecuacion no tiene solucion porque no existe la raiz cuadrada de un numero negativo";
      } else {
        $x1 = (-$b + sqrt($determinante)) / (2 * $a);
        $x2 = (-$b - sqrt($determinante)) / (2 * $a);
      ?>
      x1 = <?php echo $x1 ?><br>
      x2 = <?php echo $x2 ?><br>
      <?php 
      }
    } 
      ?>
  </body>
</html>
