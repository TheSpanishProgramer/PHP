<?php
  session_start();
  
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Capitulo 07 - Sesiones y Cookies</title>
    <style>
      body {
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        background-color: #403075;

      }

      div {
        position: relative;
        background-color: #C7B6FF;
        border-radius: 15px;
        text-align: center;
        margin: auto;
        margin-top: 50px;
        padding: 10px;
        width: 90%;

      }
      
      #productos {
        width: 50%;
        float: left;
      }
      
      #carrito {
        width: 35%;
        float: right;
      }
      
      #productos img {
        border-radius: 5px;
        width: 150px;
        height: 150px;
      }
      
      #carrito img {
        border-radius: 100%;
        float: left;
        width: 100px;
        height: 100px;
      }
      
      #productos div, #carrito div {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <?php 
    
      if (isset($_SESSION['productos'])) {
        $productos = $_SESSION['productos'];
        
      } else {
        $productos = [
            'P001' => ['nombre' => 'Smartwatch DZ09', 'precio' => 26.95, 'cantidad' => 0,
                'imagen' => 'http://srv-live.lazada.com.ph/p/image-4788321-1-product.jpg'],
            'P002' => ['nombre' => 'SmartWatch 2 SW2', 'precio' => 127.05, 'cantidad' => 0,
                'imagen' => 'https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA02/CONTENIDOS/201401/31/00189051915430____1__640x640.jpg'],
            'P003' => ['nombre' => 'SmartWatch Z80 3G', 'precio' => 64.14, 'cantidad' => 0,
                'imagen' => 'http://img20.360buyimg.com/N0/s800x800_jfs/t3040/313/420649458/340423/73fbdd16/579efad4Nf1b60b93.jpg']
            ];
        
        $_SESSION['productos'] = $productos;
      }
      
      if (isset($_GET['idComprar'])) {
        $claveProductoComprado = $_GET['idComprar'];
        $productos[$claveProductoComprado][cantidad]++;
        $_SESSION['productos'] = $productos;
      }
      
      if (isset($_GET['idEliminar'])) {
        $productos[$_GET['idEliminar']][cantidad] = 0;
        $_SESSION['productos'] = $productos;
      }
    ?>
    <div>
      <h2>Tienda online: </h2>
      <p>
        Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. 
        Un catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer 
        al menos la descripción y el precio. Todos los productos deben tener una imagen que los 
        identifique. Al lado de cada producto del catálogo deberá aparecer un botón Comprar que 
        permita añadirlo al carrito. Si el usuario hace clic en el botón Comprar de un producto 
        que ya estaba en el carrito, se deberá incrementar el número de unidades de dicho producto. 
        Para cada producto que aparece en el carrito, habrá un botón Eliminar por si el usuario 
        se arrepiente y quiere quitar un producto concreto del carrito de la compra. A continuación 
        se muestra una captura de pantalla de una posible solución.
      </p>

      <div id="productos">
        <h3>Productos</h3>
        <?php 
          foreach ($productos as $key => $value) {
            echo '<div><form action="Ejer05.php">'
                . '<img src="', $value[imagen], '">'
                . '<p>Nombre: ', $value[nombre], '</p>'
                . '<p>Precio: ', $value[precio], '€</p>'
                . '<input type="hidden" name="idComprar" value="', $key, '">'
                . '<input type="submit" value="Comprar">';
            
            echo '</form></div>';
          }
        ?>
      </div>
      
      <div id="carrito">
        <h3>Carrito</h3>
        <?php
        foreach ($productos as $key => $value) {
          if ($value['cantidad'] > 0) {
            echo '<div><form action="Ejer05.php">'
                  . '<img src="', $value[imagen], '">'
                  . '<p>Nombre: ', $value[nombre], '</p>'
                  . '<p>Precio: ', $value[precio], '€</p>'
                  . '<p>Unidades: ', $value[cantidad], '</p>'
                  . '<input type="hidden" name="idEliminar" value="', $key, '">'
                  . '<input type="submit" value="Eliminar">'
                  . '</form></div>';
            $precioTotal += $value[precio] * $value[cantidad];
              
          }
        }
        
        if (isset($precioTotal)) {
          echo "<br>Precio total: $precioTotal €";
        }
        ?>
      </div>
    </div>
  </body>
</html>