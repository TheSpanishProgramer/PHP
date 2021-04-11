<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <style>
    body{
      background-color: #C9DBFF;
    }
    div#contenedor{
      width: 70%;
      //background-color: #6699FF;
      position: relative;
      margin-left: 15%;
      overflow: auto;
    }
    div#contenedorAdmin{
      width: 70%;
      top: 40%;
      background-color: #949494;
      position: relative;
      margin-left: 15%;
      overflow: auto;
    }
    
  </style>
  <body>
      <p><b>5. Crea un carrito de la compra sencillo que permita añadir y quitar productos (tres o cuatro productos
diferentes). De cada producto se debe conocer al menos la descripción, el precio y debe tener una
imagen que lo identifique<br>
  <?php
  include('../funciones.php');

$arrayCompra = [];
  // Vuelca contenido tabla en array.
  $nombreTabla = "libros";
  pdoConexion("libreria", "root", "root", $conexion);
  
  
  // Convertir tabla en array y guardar en SESION
  pdoToArray($conexion, $nombreTabla, $articulos);
  $_SESSION['arrayTabla'] = $articulos;
  
  
  ?>
    <div id="contenedor">
      <h1 align="center">MINI LIBRERIA</h1>
      <p align="center"><a href="panelAdmin.php">MODO ADMIN</a></p>
      <br>
      <table border="1" style=" border-collapse: collapse; text-align: center; float: left; display: block;" >
        <tr> <th>PORTADA</th><th>TITULO</th><th>PRECIO</th><th>UDS</th></tr>

          <?php
          foreach ($articulos as $codigo => $elemento) { ?>
            <tr>
              <td> <img src="<?= $elemento[NOMBRE_JPG]; ?>" width="80"></td>
              <td> <?= $elemento[TITULO]; ?> </td>
              <td> <?= $elemento[PRECIO]; ?>€ </td>
              <td> <?= $elemento[STOCK]; ?> </td>
              <td>
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?= $codigo; ?>">  
                  <button name="accion" name="accion" value="comprar">Añadir al carrito</button>
                </form>
              </td>
            </tr>
          <?php
          } ?>
      </table>




      <?php
      // CARRITO
      $accion = $_POST['accion'];
      $codigo = $_POST['codigo'];

      // Si el carrito no se ha inicializdo, se inicializa. EN ESTO SE PUEDE HACER FUNCION A PARTIR DEL CATALOGO. TITULOS - CANTIDADES
      if (!isset($_SESSION[carrito])){
        $_SESSION[carrito] = array ("lasdvi" => 0, "elulta" => 0, "diamaz" => 0, "claluc" => 0);
      }

      // DATOS  RECIBIDOS DEL POST

        // COMPRAR: SUBE 1 CANTIDAD
      if ($accion == "comprar"){
        $_SESSION[carrito][$codigo]++;
      }
        // ELIMINAR: BAJA 1 CANTIDAD
      if ($accion == "eliminar"){
        $_SESSION[carrito][$codigo]--; 
      }
        // ELIMINARTODO: BAJA A 0 CANTIDAD
      if ($accion == "eliminarTodos"){
        $_SESSION[carrito][$codigo] = 0; 
      }
      if ($accion == "comprado"){
        //$arrayCompra = $_SESSION['elemCompra'];
        
        var_dump($_SESSION['elemCompra']);
     
        
      }
           
      

      // TABLA CARRITO
      ?>
      <br>
      <table border="1" style="border-collapse: collapse; position: relative; float: left; display: block; left:20%; text-align: center; top: 5%; " >

        <tr><th>CANTIDAD</th> <th>PORTADA</th> <th>TITULO</th> <th>PRECIO</th></tr>

          <?php
          $total = 0;
            foreach ($articulos as $cod => $elemento) {
              if ($_SESSION[carrito][$cod] > 0){
                
                // Guardar en array de sesion los nombres de los articulos
                echo "<br>";
                
                $_SESSION['elemCompra'] = $elemento[COD];
                //var_dump($_SESSION['elemCompra']);
                echo "<br>";
                // Fin Guardar en array de sesion los nombres.
               // SUMAR PRECIO TOTAL
                 $total = $total + ($_SESSION[carrito][$cod] * $elemento[PRECIO]);
                 ?>

                <tr>
                  <td> <?= $_SESSION[carrito][$cod]?></td>
                  <td> <img src="<?= $elemento[NOMBRE_JPG]; ?>" width="40"></td>
                  <td> <?= $elemento[TITULO]; ?> </td>
                  <td> <?= $elemento[PRECIO]; ?>€ </td>

                  <td>
                    <form action="#" method="post">
                      <input type="hidden" name="codigo" value="<?= $cod; ?>">  
                      <button name="accion" value="eliminar">ELIMINAR</button><br>
                      <button name="accion" value="eliminarTodos">VACIAR(<?= $_SESSION[carrito][$cod];?>)</button>
                    </form>
                  </td>
                </tr><?php
              }
            }
              ?>
            <tr style="text-align: right;">
            <td colspan="4"> <b>TOTAL A PAGAR:</b> <?= $total?>€ </td>
            <form action="#" method="post">
              <td> <button name="accion" value="comprado">COMPRAR</button> </td>
            </form> 
          </tr>
      </table>

    </div>

  </body>
</html>
