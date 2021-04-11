<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <p>1.Crea listado sobre la tabla Clientes que permita ALTA, BAJA y MODIFICACION, mediante el DNI.</p>
    <h2>
    Base de datos PDO <u>banco</u><br>
    Tabla <u>cliente</u><br>
    </h2>
    <?php
    include('../../funciones.php');
    
    // CONEXION E INFORMACION --------------------------------------------------
      // Conexion
        pdoConexion("banco", "root", "root", $conexion);
        $nombreTabla = "cliente";
        $campoClave = "dni";
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
      // ORDENAR
      if (isset($_GET['orden'])){
        $elementOrdenSes = $_GET['orden']; 
      }
      // ARTICULOS POR PAGINA
      if (isset($_POST['artpagina'])){
        $pagSes = 1;                                                            // Va a pagina 1 si se cambia el num_art_pagina
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
      pdoTablaPag($conexion, $nombreTabla,$pagSes, $art_por_paginaSes, $datosTabla, $elementOrdenSes);
     
      // Mostrar botones paginado.
      pdoBotonesPaginas($pagSes, $ultPagina); ?>
    <br> <?php
      // Mostrar desplegable order by y articulos por pagina
      pdoOrdenar($nomColumnas, $numColumnas, $elementOrdenSes); 
      pdoArticulosPagina($nomColumnas, $numColumnas, $art_por_paginaSes, $opcion1, $opcion2, $opcion3); ?>
    </body>
</html>