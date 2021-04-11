<?php
    include_once 'Zona.php';
    require_once 'functions_Objects.php';
    
    // Si no existe la sesion con los objetos, crearla.
         if (!isset($_SESSION['zonas'])) {
            $_SESSION['zonas'] = serialize(array(new Zona("Sala-Principal", 1000,15),
                                                                         new Zona("Compra-venta", 200,5),
                                                                         new Zona("Vip", 25,25)));
            // Guarda la cantidad en sesion
            $_SESSION['cantZonas'] = Zona::getCantZonas();
            $_SESSION['ganancias'] = Zona::getGanancias();
        }     
        
        // Exportar objetos al array y ganancias.
        $zonas = unserialize($_SESSION['zonas']);
        Zona::setGanancias($_SESSION['ganancias']);
        Zona::setCantZonas($_SESSION['cantZonas']);
    
        if (isset($_POST['zona'])){
            // Recoger datos de formulario 
           $zona = $_POST['zona'];
           $cantidad = $_POST['cantidad'];
           $pagado = $_POST['pagado'];

           // Buscar coincidencias en array de objetos.
           $zonaElegida = findObject($zonas, "getTipo", $zona);
           if (!$zonaElegida->actionVende($cantidad)){
               echo "<script type='text/javascript'>alert('No hay tantas entradas disponibles');</script>";
           }else{
               $mensaje = $zonaElegida->actionPagar($pagado,$cantidad);
               echo "<script type='text/javascript'>alert('".$mensaje."');</script>";
           }
           // Guardar array de objetos en sesion
           $_SESSION['zonas'] = serialize($zonas);   
           $_SESSION['ganancias'] = Zona::getGanancias();
        }
         
       
    