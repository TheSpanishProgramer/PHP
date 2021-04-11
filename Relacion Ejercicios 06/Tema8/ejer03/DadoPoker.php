<?php

/* Clase dado */

class DadoPoker {
  
// atributos
private $cara;

// atributos de clase : Sirven para toda la clase.
  private static $TiradasTotales = 0;

  
// método de clase
  public static function getTiradasTotales() {
    return DadoPoker::$TiradasTotales;
  }
  
  public function tira(){
    $arrayCaras = ['7','8','J','Q','K','AS'];
    $rnd = rand(0, 5);
    $this->cara = $arrayCaras[$rnd];
    DadoPoker::$TiradasTotales++;
    
  }
  public function nombreFigura(){
    return $this->cara;
  }
  
  function getCara() {
    return $this->cara;
  }
  static function setTiradasTotales($TiradasTotales) {
    self::$TiradasTotales = $TiradasTotales;
  }




  

  
 
}
