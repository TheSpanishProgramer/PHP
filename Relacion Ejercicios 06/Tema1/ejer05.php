<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <b>5. Escribe un programa que utilice las variables $x y $y . Asignales los valores 144 y 999 respectiva-
mente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división
y la multiplicación. </b><br><br>
    <?php
    $x = 144;
    $y = 999;
    
    $suma = $x+$y;
    $resta = $x-$y;
    $division = $x/$y;
    $multiplicacion = $x*$y;
    
    echo 'La suma es: ',$suma, '<br>';
    echo 'La resta es: ', $resta, '<br>';
    echo 'La multiplicacion es: ', $multiplicacion, '<br>';
    echo 'La division es: ',$division;
    ?>
  </body>
</html>
