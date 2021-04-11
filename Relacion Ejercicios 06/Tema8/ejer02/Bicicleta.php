<?php

include_once 'Bicicleta.php';

/* SubClase coche de clase Vehiculo */

class Bicicleta extends Vehiculo {
  
// atributos
  private $cambios;
                                                 
// Metodo constructor que incluye los de la clase.
public function __construct($mar, $mod, $cam) {
  parent::__construct($mar, $mod);                                            // Incluye metodo constructor de la clase.
  if (isset($cam)){                                                           //Si no se especifica los cambios, defecto: 6
    $this->cambios = $cam;
  }else{
    $this->cambios = "6";
  }
}
public function caballito(){
  return "¡La bici ".$this->getMarca()." hace el caballito sin manos!";       //Obtiene la marca de un metodo publico de su clase.
}

 public function __toString() {
    return parent::__toString() . "<br>Cambios: $this->cambios";
  }
 
}
