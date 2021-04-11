<?php
class TV extends Articulo{
    public $pulgadas;
    public $resolucion;

    public function __construct($c,$n,$nc,$p,$pul,$r) {
        parent::__construct($c,$n,$nc,$p);
        $this->pulgadas=$pul;
        $this->resolucion = $r;
    }

    public function __toString() {
        //Llamamos al toString de la clase padre
        return parent::__toString(). "<pre> {$this->pulgadas}, {$this->resolucion}</pre>";
    }
}