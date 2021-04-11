<?php

include_once 'Vehiculo.php';

/* SubClase coche de clase Vehiculo */

class Coche extends Vehiculo {
  
// atributos
  private $matricula;
                                                 
// Metodo constructor que incluye los de la clase.
public function __construct($mar, $mod, $mat) {
  parent::__construct($mar, $mod);                                            // Incluye metodo constructor de la clase.
  if (isset($mat)){
    $this->matricula = $mat;
  }else{
    $this->matricula = "0000ABC";
  }
}
public function quemaRueda(){
  return "¡Uffff el coche ha quemado rueda!";
}

 public function __toString() {
    return parent::__toString() . "<br>Matricula: $this->matricula";
  }
 
}
