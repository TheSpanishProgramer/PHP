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
      background-color: #6699FF;
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

// Si no existe cookie catalogo, crear array articulos
if ( !isset($_COOKIE['catalogo_articulos']) ){
  
  $articulos = array (
    "lasdvi" => array ("titulo" => "La sombra del viento", "precio" => 17.95, "imagen" => "lasdvi.jpg"),
    "elulta" => array ("titulo" => "El ultimo adios", "precio" => 11.95, "imagen" => "elulta.jpg"),
    "diamaz" => array ("titulo" => "Diamante azul", "precio" => 20, "imagen" => "diamaz.jpg"),
    "claluc" => array ("titulo" => "Claus y Lucas", "precio" => 9.95, "imagen" => "claluc.jpg")
  );
  
  // Guardar ese array en la cookie. 
  cookieArrayToCookie($articulos,'catalogo_articulos');

// Si la cookie ya existe, leerla y sacar el array de articulos.
}else{
 
  // Leer la cookie y convertir en array de nuevo
  cookieRecibeArray('catalogo_articulos', $articulos);
}
// Recoge datos de elementos.
$accion = $_POST['accion'];
$codigo = $_POST['codigo'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$rutaImg = $_POST['rutaImg'];

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
// ACCIONES DEL ADMIN
  // BAJA: DARA DE BAJA UN LIBRO
if ($accion == "baja"){
  unset($articulos[$codigo]);    
  cookieArrayToCookie($articulos,'catalogo_articulos');
}
  // ALTA: DAR DE ALTA UN LIBRO
if ($accion == "alta"){
  alta($articulos, $codigo, $titulo, $precio, $rutaImg);
  cookieArrayToCookie($articulos,'catalogo_articulos');
}


// Mensaje que muestra tipo usuario que ha accedido desde index.
$nombre = $_SESSION['tipoAcceso'];
echo "Conectado como > ". $nombre;

//ZONA ADMIN
// Si el usuario es admin:
if ($nombre == "admin"){

// Panel admin ?>
<div id="contenedorAdmin">
<h1 align="center">PANEL ADMINISTRADOR</h1>
    <table border="1" style=" border-collapse: collapse; text-align: center; float: left; display: block;" >
      <tr> <th>COD</th> <th>TITULO</th> <th>PRECIO</th> <th>NOMBRE JPG</th> <th>ACCION</th></tr>
      <?php if ($accion != "modificar"){ 
        // Si no se ha pulsado en modificar, solo mostrar cuadros de texto en ALTA.?>
      <tr>
      <form action="#" method="post">
        <td><input type="text" name="codigo" placeholder="codigo"></td>
        <td><input type="text" name="titulo" placeholder="titulo"></td>
        <td><input type="number" name="precio" placeholder="precio"></td>
        <td><input type="text" name="rutaImg" placeholder="ruta jpg"></td>
        <td><button name="accion" value="alta">ALTA</td>
      </form>
      </tr>
      <?php } ?>
      <?php if ($accion == "modificar"){ 
        // Si se ha pulsado en modificar, mostrar informacion del elemento segun el $codigo enviado.?>
       <tr>
      <form action="#" method="post">
        <td><input type="text" name="codigo" value="<?= $codigo;?>"</td>
        <td><input type="text" name="titulo" value="<?= $articulos[$codigo][titulo] ;?>"></td>
        <td><input type="number" name="precio" value="<?= $articulos[$codigo][precio] ;?>"></td>
        <td><input type="text" name="rutaImg" value="<?= $articulos[$codigo][imagen] ;?>"></td>
        <td><button name="accion" value="alta">ACEPTAR CAMBIOS</td>
      </form>
      </tr> 
      <?php } ?>  
        
        
        <?php //Mostrar tabla de articulos
        foreach ($articulos as $codigo => $elemento) { ?>
          <tr>
            <td> <?= $codigo; ?> </td>
            <td> <?= $elemento[titulo]; ?> </td>
            <td> <?= $elemento[precio]; ?>€ </td>
            <td> <?= $elemento[imagen]; ?> </td>
            <td>
              <form action="#" method="post">
                <input type="hidden" name="codigo" value="<?= $codigo ?>">  
                <button name="accion" value="baja">BAJA</button> 
                <button name="accion" value="modificar">MODIFICACION</button> 
              </form>
            </td>
          </tr>
        <?php
        }?>

    </table>
</div>

<?php }

// Si no esta logueado, retornar a pagina logueo.
  if ($nombre == ""){
    header('Location: index.php');
  }else{


//  MUESTRO TABLA ARTICULOS
?>
  <div id="contenedor">
    <h1 align="center">MINI LIBRERIA</h1>
    <table border="1" style=" border-collapse: collapse; text-align: center; float: left; display: block;" >
      <tr> <th>PORTADA</th><th>TITULO</th><th>PRECIO</th></tr>

        <?php
        foreach ($articulos as $codigo => $elemento) { ?>
          <tr>
            <td> <img src="<?= $elemento[imagen]; ?>" width="80"></td>
            <td> <?= $elemento[titulo]; ?> </td>
            <td> <?= $elemento[precio]; ?>€ </td>
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


    // Si el carrito no se ha inicializdo, se inicializa
    if (!isset($_SESSION[carrito])){
      $_SESSION[carrito] = array ();
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
             // SUMAR PRECIO TOTAL
               $total = $total + ($_SESSION[carrito][$cod] * $elemento[precio]);
               ?>

              <tr>
                <td> <?= $_SESSION[carrito][$cod]?></td>
                <td> <img src="<?= $elemento[imagen]; ?>" width="40"></td>
                <td> <?= $elemento[titulo]; ?> </td>
                <td> <?= $elemento[precio]; ?>€ </td>

                <td>
                  <form action="#" method="post">
                    <input type="hidden" name="codigo" value="<?= $cod; ?>">  
                    <button name="accion" name="accion" value="eliminar">ELIMINAR</button><br>
                    <button name="accion" name="accion" value="eliminarTodos">VACIAR(<?= $_SESSION[carrito][$cod];?>)</button>
                  </form>
                </td>
              </tr><?php
            }
          }
            ?>
          <tr style="text-align: right;">
          <td colspan="4"> <b>TOTAL A PAGAR:</b> <?= $total?>€ </td>
          <td> <input type="submit" name="ok" value="PAGAR"> </td>
        </tr>
    </table>

  </div>
<?php } ?>
  </body>
</html>
