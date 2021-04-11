<?php

/* Clase persona */

class Vehiculo {
  
// atributos
  private $marca;
  private $modelo;
  private $kilometraje;

// atributos de clase : Sirven para toda la clase.
  private static $vehiculosCreados = 0;
  public static $kmTotales = 0;                                                 // Es publico porque se modifica cada vez que se llama a recorre() en alguna subclase como coche.
  
// método de clase
  public static function getVehiculosCreados() {
    return Vehiculo::$vehiculosCreados;
  }
  public static function getKmTotales() {
    return Vehiculo::$kmTotales;
  }
  function getMarca() {
    return $this->marca;
  }

    public function __construct($mar, $mod) {
    $this->marca = $mar;                // Son this-> porque son privados, y se refiere al objeto creado
    $this->modelo = $mod;
    $this->kilometraje = 0;
    Vehiculo::$vehiculosCreados++;      // Es Vehiculo:: porque es publico y se refiere a la clase principal.
  }
  public function getKilometrosRecorridos() {
    return $this->kilometraje;
  }
  public function recorre($km) {
    $this->kilometraje += $km;
    Vehiculo::$kmTotales += $km;
    echo "<br>Mi  $this->marca anda  $km kilometros.";
  }
  public function getKilometraje() {
    return $this->kilometraje;
  }
  public function __toString() {
    return "<br>======================<br>"
            . "Marca: $this->marca <br>"
            . "Modelo: $this->modelo <br>"
            . "Kilometraje: $this->kilometraje ";
  }
 
}
