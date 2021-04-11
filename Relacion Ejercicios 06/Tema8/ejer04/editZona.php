<?php 
session_start();
require_once './Zona.php';
require_once './functions_Objects.php';

// Recibe datos de formulario
$tipo = $_GET['tipo'];
    
// Extraigo array
$zonas = unserialize($_SESSION['zonas']);

// Encuentro el objeto en el array.
$objetoEditar = findObject($zonas, "getTipo", $tipo);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Editar Zona</title>
  </head>
  <body>
      <form action="editedZona.php"  enctype="multipart/form-data" method="POST">
      <h3>Tipo</h3>
      <input type="text" size="40"  id="tipo" name="tipo" value="<?= $objetoEditar->getTipo()?>">
      <h3>Aforo maximo</h3>
      <input type="number" step="1" id="aforo" name="aforo" value="<?= $objetoEditar->getNumEntradas()?>">
      <h3>Precio entrada</h3>
      <input type="number" id="precio" step="0.1" name="precio" value="<?= $objetoEditar->getPrecio()?>">
     
      <br><br>
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>


