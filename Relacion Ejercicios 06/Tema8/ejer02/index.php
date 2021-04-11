<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h2>2. Crea la clase Vehiculo , así como las clases Bicicleta y Coche como subclases de la primera.<br>
      Para la clase Vehiculo , crea los métodos de clase getVehiculosCreados() y getKmTotales() ; así como el
método de instancia getKmRecorridos() . <br>
Crea también algún método específico para cada una de las subclases.</h2>
  <?php
    include_once 'Vehiculo.php';
    include_once 'Bicicleta.php';
    include_once 'Coche.php';
    
    $cocheDeLuis = new Coche("Saab", "93","2540CKF");
    $cocheDeJuanK = new Coche("Toyota", "Avensis","4022GVV");
    $bicidePedro = new Bicicleta("Monty","road","10");
    
    $cocheDeLuis->recorre(30);
    $cocheDeLuis->recorre(220);
    
    $cocheDeJuanK->recorre(60);
    $cocheDeJuanK->recorre(90);
    
    $bicidePedro->recorre(2);
    echo "<br>";
    echo $bicidePedro->caballito();
    echo "<br>";
    echo "El coche de Luis ha recorrido " . $cocheDeLuis->getKilometraje() . "Km<br>";
    echo "El coche de Juan Carlos ha recorrido " . $cocheDeJuanK->getKilometraje() . "Km<br>";
    echo "La bici de Pedro ha recorrido " . $bicidePedro->getKilometraje() . "Km<br>";
    echo "<br>";
    echo "KILOMETRAJE TOTAL: " . Vehiculo::getKmTotales() . "Km<br>";
    echo "NUMERO VEHICULOS CREADOS: " . Vehiculo::getVehiculosCreados() . "<br>";
    echo $cocheDeJuanK;
    echo $cocheDeLuis;
    echo $bicidePedro;
  ?>
  </body> 
</html>






