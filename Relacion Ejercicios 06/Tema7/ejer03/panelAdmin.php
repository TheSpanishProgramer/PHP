<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <style>
    body{
      background-color: darkslategray;
      color:white;
    }
    a{color: white;}
  </style>
  <body>
    <p>3. Modifica la tienda virtual realizada anteriormente de tal forma que todos los datos de los artículos
se guarden en una base de datos.</p>
    <h2>
    Base de datos PDO <u>Libreria</u><br>
    Tabla <u>libros</u><br>
    </h2>
    <p align="center"><a href="index.php">MODO TIENDA</a></p>
    <?php
    include('../funciones.php');
    
    // CONEXION E INFORMACION --------------------------------------------------
      // Conexion
        pdoConexion("libreria", "root", "root", $conexion);
        $nombreTabla = "libros";
        $campoClave = "COD";
        $numColumStock = 4;
        $datosTabla ="";                                                          // Campo solo usado en funcion cuando clicka modificar
      // Valores a mostrar de articulos por pagina.
        $opcion1 = 2;
        $opcion2 = 5;
        $opcion3 = 10;
      $datosTablaOrigSes =& $_SESSION['datosOriginal'];                         // Contiene datos originales para comparacion de UPDATE.
      // Extraer nombres de columnas y cantidad.
      pdoArrayCol($conexion, $nombreTabla, $nomColumnas, $numColumnas);
      // FIN CONEXION ----------------------------------------------------------
      
      // INICIACION COOKIES ----------------------------------------------------  
        // Declarar pagina y alias
      if(!isset($_SESSION['pagina'])) {
        $_SESSION['pagina'] = 1;
      }
       $pagSes =& $_SESSION['pagina'];
      
      // Declarar ORDEN y alias
      if(!isset($_SESSION['orden'])) {
        $_SESSION['orden'] = $campoClave;
      }
      if(!isset($_SESSION['artpagina'])) {
        $_SESSION['artpagina'] = $opcion1;
      }
       $elementOrdenSes =& $_SESSION['orden'];
       $art_por_paginaSes =& $_SESSION['artpagina'];      

      
      
      
      // RECIBIR ALTA,BAJA,MODIF -------------------------------------------------
        // ALTA 
      if (isset($_POST['alta'])){
        for ($i = 0; $i < $numColumnas; $i++){
         $datosTabla[] = $_POST[$nomColumnas[$i]]; 
        }

        // Transforma el array de datos recibidos en una frase: EJ: 2573063','Julian Garcia','c/ Avellanas','60578523
        pdoArrayAlta($datosTabla, $sentenciaAlta);
        
        // Incluir comprobacion dni existente
        if(pdoCompruebaDato($conexion, $nombreTabla, $campoClave, $datosTabla[0])){
          echo " - Error. Cliente con codigo <b>".$datosTabla[0]."</b> ya existe.";  
        }else{
          pdoConsulta_Alta($conexion, $nombreTabla, $sentenciaAlta);
          echo " - Cliente <b>".$datosTabla[1]."</b> añadido con éxito.";
        }
      }
      // BAJA
      if (isset($_POST['baja'])){
        $codigo = $_POST['codigo'];

        pdoConsulta_Borrar($conexion, $nombreTabla, $campoClave, $codigo);
        echo " - Cliente con dni: <b>".$codigo."</b> eliminado con éxito.";   
      }
      // A MODIFICAR
      if (isset($_POST['aModificar'])){
        for ($i = 0; $i < $numColumnas; $i++){
         $datosTabla[] = $_POST[$nomColumnas[$i]];
         $datosTablaOrigSes = $datosTabla;
         
        }
        
      }
      
      // MODIFICACION
      if (isset($_POST['modificacion'])){
        for ($i = 0; $i < $numColumnas; $i++){
          $datosTabla []= $_POST[$nomColumnas[$i]]; 
        }
                
        pdoConsulta_Modificar($conexion, $nombreTabla,$nomColumnas,$numColumnas, $datosTabla, $datosTablaOrigSes);
        echo " - Cliente <b>".$datosTabla[1]."</b> modificado con éxito."; 
        
      }
      // STOCK 
      if (isset($_POST['stock'])){
        $codigo = $_POST[$nomColumnas[0]];
        $stockOri = $_POST[$nomColumnas[4]];
        
        if($_POST['entrada'] > 0){
          $stockIN = $_POST['entrada'];
          pdoConsulta_EntradaStock($conexion, $nombreTabla, $nomColumnas, $codigo,$stockOri, $stockIN);
          echo " - Stock de elemento <b>".$codigo."</b> aumentado en ".$stockIN; 
        }
        if($_POST['salida'] > 0){
          $stockOUT = $_POST['salida'];
          
          pdoConsulta_SalidaStock($conexion, $nombreTabla, $nomColumnas, $codigo,$stockOri, $stockOUT);
          echo " - Stock de elemento con ID:<b>".$codigo."</b> disminuido en ".$stockOUT; 
        }
          
      }
      // ORDENAR
      if (isset($_GET['orden'])){
        $elementOrdenSes = $_GET['orden']; 
      }
      // ARTICULOS POR PAGINA
      if (isset($_POST['artpagina'])){
         $pagSes = 1;                                                             //Esto hace que si se cambia el numero de articulos por pagina, redirige a la pag1
        $art_por_paginaSes = $_POST['artpagina']; 
      }
      
    
    // FIN RECIBIR DATOS -------------------------------------------------------
      
      
      
      
    // PAGINADO Y ORDEN ARTICUTLOS ---------------------------------------------  
      
      pdoNumPaginas($conexion, $nombreTabla, $art_por_paginaSes, $ultPagina);
      
      
    // FIN PAGINADO ------------------------------------------------------------

    
    
    // PAGINADO ----------------------------------------------------------------
      // Recibo orden de a qué pagina quiero ir.
      $paginaEnv = $_POST['pagEnv'];
      
      // Control movimiento paginas
      pdoPaginado($paginaEnv, $pagSes, $ultPagina);
    // FIN PAGINADO ------------------------------------------------------------

    // MOSTRAR TABLA Y PAGINAS -------------------------------------------------
      // Mostrar listado limitado por numero de articulos que deseo mostrar
      pdoTablaPag_InOut($conexion, $nombreTabla,$pagSes, $art_por_paginaSes, $datosTabla, $elementOrdenSes,$numColumStock);
     
      // Mostrar botones paginado.
      pdoBotonesPaginas($pagSes, $ultPagina); ?>
    <br> <?php
      // Mostrar desplegable order by y articulos por pagina
      pdoOrdenar($nomColumnas, $numColumnas, $elementOrdenSes); 
      pdoArticulosPagina($nomColumnas, $numColumnas, $art_por_paginaSes, $opcion1, $opcion2, $opcion3); ?>
    </body>
</html>