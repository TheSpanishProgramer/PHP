<html>
  <head>
    <meta>
    <title></title>
  </head>
  <body>
  <?php

/* Pagina que usa la clase persona */

include_once 'Persona.php'; 

// Opcion 1: Atributos con construct.
$persona1 = new Persona("Pepe", 28);

// Opcion 2: Atributos con setter
$persona2 = new Persona();
$persona2->setNombre("Alberto");
$persona2->setNombre(40);

echo $persona1;
echo $persona2;

 ?>
  </body> 
</html>






