<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gato
 *
 * @author duveral
 */
include_once 'Mamifero.php';
class  Gato extends Mamifero {

// Atributos de instancia
    private $castrado;

// Constructor
    function __construct($nombre,$sexo,$color,$raza,$numPatas,$castrado = "no") {
        parent::__construct($nombre, $sexo, $color, $raza,$numPatas);
        $this->castrado = $castrado;
    }

// Getter and Setter
    function getCastrado() {
        return $this->castrado;
    }

    function setCastrado($castrado) {
        $this->castrado = $castrado;
    }

// Metodos
    //Este metodo esta redefiniendo el de la clase Animal.
    public function actionAparea() {
        if ($this->getCastrado()=="si"){
            return "No puedo, estoy castrado.";
        }else{
            return "Genial, quiero una familia.";
        }
    }

// To String
    public function __toString() {
        return  parent::__toString() . "<br>Castrado: " . $this->getCastrado();
    }


}
