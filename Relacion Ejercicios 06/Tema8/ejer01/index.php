<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h2>1. Crea las clases Animal , Mamifero , Ave , Gato , Perro , Canario , Pinguino y Lagarto . Crea, al menos,
tres métodos específicos de cada clase y redefine el/los método/s cuando sea necesario. Prueba las
clases en un programa en el que se instancien objetos y se les apliquen métodos. Puedes aprovechar
las capacidades que proporciona HTML y CSS para incluir imágenes, sonidos, animaciones, etc.
para representar acciones de objetos; por ejemplo, si el canario canta, el perro ladra, o el ave vuela.
  <?php
    
    include_once 'Canario.php';
    include_once 'Gato.php';
    include_once 'Perro.php';
    
    $laika = new Perro("Laika", "hembra", "blanco", "perro", "4","no");
    $piolin = new Canario("Pepe", "macho", "amarillo", "canario", "2 cm");
    $felix = new Gato("Felix", "macho", "negro", "persa", "4","no");
    
    echo $piolin;
    echo "<br>";
    echo $felix;
    echo "<br>";
    echo $laika;
    echo "<br><br>";
    echo $piolin->actionPiar();
    echo "<br>";
    echo $felix->actionAparea();
    echo "<br>";
    echo $laika->actionPonHuevo();
    echo "<br>----<br>";
    echo "Numero de animales creados:" . Animal::getNumAnimales();
  ?>
  </body> 
</html>






