<?php 
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h2>3. Crea la clase DadoPoker . Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J,
7 y 8 . Crea el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor
aleatorio para el objeto al que se le aplica el método. Crea también el método nombreFigura() , que
diga cuál es la figura que ha salido en la última tirada del dado en cuestión. Crea, por último, el
método getTiradasTotales() que debe mostrar el número total de tiradas entre todos los dados.
Realiza una aplicación que permita tirar un cubilete con cinco dados de poker.</h2>
  <?php
    include_once 'DadoPoker.php';
    
    //SESIONES VARIABLES
    $SESTiradasTotales =& $_SESSION['tiradasTotales'];
    $SESTiradaAnterior =& $_SESSION['tiradaAnterior'];
    
    
    // PRIMERA CARGA PAGINA
    if (!isset($SESTiradasTotales)){
      $SESTiradasTotales = 0;
      $SESTiradaAnterior = [];
      
      // Crea objetos dados
      for($x = 0; $x < 5; $x++){
        $arrayDado[$x] = new DadoPoker(); 
      }
    
    }
    // SEGUNDA CARGA PAGINA Y POST.
    else{
      // Recibe array de anterior_tirada sesion.
      for($x = 0; $x < 5; $x++){
        $arrayDado[$x] = unserialize($SESTiradaAnterior[$x]);
      }
      // Muestra TIRADA ANTERIOR
      echo "TIRADA ANTERIOR: ";
       for($x = 0; $x < 5; $x++){
         echo $arrayDado[$x]->getCara()." ";
       }
      echo "<br>";
      
    }
   
 
    //============== JUEGO ============================
    
    
    // Tirar 5 dados
    for($x = 0; $x < 5; $x++){
      $arrayDado[$x]->tira();
    }
    // Mostrar 5 dados
    echo "TIRADA NUEVA:";
    for($x = 0; $x < 5; $x++){
      echo $arrayDado[$x]->getCara()." ";
    }
    // Guarda en sesion la suma de las tiradas
    $SESTiradasTotales += DadoPoker::getTiradasTotales();
    
    // Guarda objeto DADOS en sesion (DEBE guardarse el array serializado).
    for($x = 0; $x < 5; $x++){
      $SESTiradaAnterior[$x] = serialize($arrayDado[$x]);
    }
    
    // Lo que haya en sesion serán las totales.
    DadoPoker::setTiradasTotales($SESTiradasTotales); 
    
  ?>
    <br>
    <input type="submit" onclick="location.reload()" value="TIRAR" ></input>
    <div>TIRADAS TOTALES:<span><?= DadoPoker::getTiradasTotales()/5?></span></div>
  </body> 
</html>






