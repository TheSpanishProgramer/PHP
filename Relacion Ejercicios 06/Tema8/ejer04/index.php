<?php session_start() ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h2>4. Queremos gestionar la venta de entradas (no numeradas) de Expocoches Campanillas que tiene
3 zonas, la sala principal con 1000 entradas disponibles, la zona de compra-venta con 200 entradas
disponibles y la zona vip con 25 entradas disponibles.
  <?php
    include_once './cargaInicio.php';
  ?>

<h1>EXPOCOCHES CAMPANILLAS</h1>
<h2>Compra entradas</h2>
<h3>Zonas</h3>

<p><?= Zona::getAll($zonas)  ?></p>

<br>Comprar entradas
<form method="post">
    <select name="zona">
        <?php
         foreach ($zonas as $zona) { ?>
            <option value="<?= $zona->getTipo() ?>"><?= $zona->getTipo() ?></option> <?php
        }    ?>
           </select>
    Cantidad <input type="number" name="cantidad"required="required">
    Pagado <input type="number" name="pagado" step="0.10" required="required">
    <input type="submit" value="Comprar">
</form>
<hr>
<h2>Administrador</h2>
<h3>Crear Zona</h3>
<form method="post" action="addZona.php">
    Tipo de zona <input type="text" name="tipo"required="required" >
    Aforo maximo <input type="number" name="aforo" step="1"required="required">
    Precio entrada <input type="number" name="precio" step="0.10" required="required">
    <input type="submit" value="Añadir">
    </form>

    <p>GANANCIAS: <?= Zona::getGanancias() ?> euros.</p>
    <p>NUM. ZONAS: <?= Zona::getCantZonas()?>.</p>
<?php 
   
?>
  </body> 
</html>






