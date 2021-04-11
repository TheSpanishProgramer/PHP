<?php

/**
 * Description of Zonas
 *
 * @author duveral
 */

class  Zona {
    private static $cantZonas =0;
    private static $ganancias =0;

// Atributos de instancia (o de objeto)
    private $tipo;
    private $numEntradas;
    private $precio;

// Construct
    function __construct($tipo, $numEntradas,$precio) {
        $this->tipo = $tipo;
        $this->numEntradas = $numEntradas;
        $this->precio = $precio;
        Zona::$cantZonas++;
    }

// Getter and Setter   
    function getTipo() {
        return $this->tipo;
    }

    function getNumEntradas() {
        return $this->numEntradas;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setNumEntradas($numEntradas) {
        $this->numEntradas = $numEntradas;
    }
    function getPrecio() {
        return $this->precio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }
    static function getCantZonas() {
        return self::$cantZonas;
    }

    static function setCantZonas($cantZonas) {
        self::$cantZonas = $cantZonas;
    }
    static function getGanancias() {
        return self::$ganancias;
    }

    static function setGanancias($ganancias) {
        self::$ganancias = $ganancias;
    }


    
// Muestra todos los objetos desde un array (Incluye editar y borrar)
    public static function getAll($array){
        $listado ="";
        foreach ($array as $value) {
            $listado .= $value. "<a href='removeZona.php?tipo=" .$value->getTipo(). "'=>Borrar</a>".
                                          "  <a href='editZona.php?tipo=" .$value->getTipo(). "'=>Editar</a><br><br>";
        }    
        return $listado;
    }

// Metodos de instancia (objeto)
    public function actionVende($cantidadEntradas) {
        $numEntradas = $this->getNumEntradas() - $cantidadEntradas;

            if ($numEntradas < 0){
                return false;
            }else{
        
                $this->setNumEntradas($numEntradas);
                return true;
            }       
    }
    public function actionPagar($pagado,$cantidadEntradas) {
        $mensaje ="";
        if ($this->getPrecio()*$cantidadEntradas == $pagado){
            $mensaje = "Muchas gracias.";
            Zona::setGanancias(Zona::getGanancias() + $pagado); 
        }
        if ($this->getPrecio()*$cantidadEntradas < $pagado){
            Zona::setGanancias(Zona::getGanancias() + ($this->getPrecio()*$cantidadEntradas)); 
            $cambio = $pagado - $this->getPrecio()*$cantidadEntradas;
            $mensaje = "Su cambio es ".$cambio." euros. Muchas gracias.";
        }
        if ($this->getPrecio()*$cantidadEntradas > $pagado){
            $resto = $this->getPrecio()*$cantidadEntradas;
            $mensaje = "No es suficiente, debe pagar al menos ".$resto." euros. Muchas gracias.";
        }
        return $mensaje;    
    }

// To String
    public function __toString() {
        return " Tipo de Zona: " . $this->getTipo() . 
                   "<br>Entradas disponibles: " . $this->getNumEntradas().
                   "<br>Precio entrada: " . $this->getPrecio() . " eur<br>";
    }


}
