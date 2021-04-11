<?php

/* Clase persona */

class Persona {
  
  // atributos
  
  private $nombre;
  private $edad;
  
  // Metodos
    // especiales
    public function __construct($nom, $eda){
      $this->nombre = $nom;
      $this->edad = $eda;
    }
    public function __toString() {
      return "Soy una persona, mi nombre es ".$this->nombre." y mi edad ".$this->edad.".<br>";
    }
    
    // normales
    public function presentarse() {
      return "Hola, me presento y tengo " . $this->edad . " tacos.<br>";
    }
    
    // setter/getter
    function getNombre() {
      return $this->nombre;
    }
    function getEdad() {
      return $this->edad;
    }
    function setNombre($nombre) {
      $this->nombre = $nombre;
    }
    function setEdad($edad) {
    $this->edad = $edad;
  }




  
  
}
