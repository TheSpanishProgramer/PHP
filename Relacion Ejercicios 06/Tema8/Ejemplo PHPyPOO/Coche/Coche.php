<?php

/* Clase persona */

class Coche {
  
// atributos
  private $marca;
  private $modelo;
  private $kilometraje;

// atributo de clase
  private static $kilometrajeTotal = 0;
  
// método de clase
  public static function getKilometrajeTotal() {
    return Coche::$kilometrajeTotal;
  }
  
  public function __construct($ma, $mo) {
    $this->marca = $ma;
    $this->modelo = $mo;
    $this->kilometraje = 0;
  }
  public function getKilometraje() {
    return $this->kilometraje;
  }
  public function recorre($km) {
    $this->kilometraje += $km;
    Coche::$kilometrajeTotal += $km;
}
 
}
