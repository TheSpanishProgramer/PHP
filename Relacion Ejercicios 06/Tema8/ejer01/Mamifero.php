<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mamifero
 *
 * @author duveral
 */
include_once 'Animal.php';
class  Mamifero extends Animal {

// Atributos de instancia
    private $numPatas;

// Constructor
    function __construct($nombre,$sexo,$color,$raza,$numPatas = 4) {
        parent::__construct($nombre, $sexo, $color, $raza);
        $this->numPatas = $numPatas;
    }

// Getter and Setter
    function getNumPatas() {
        return $this->numPatas;
    }

    function setNumPatas($numPatas) {
        $this->numPatas = $numPatas;
    }

// Metodos
    public function actionDarComida() {
        return $this->getNombre() . " te da las gracias.";
    }

    public function actionPonHuevo() {
        return "Soy un " . $this->getRaza() . ", no pongo huevos.";
    }

    public function actionPelea() {
        return $this->getNombre() .  " se ha peleado con otro animal random.";
    }
// To String
    public function __toString() {
        return  parent::__toString() . "<br>Numero de patas: " . $this->getNumPatas();
    }


}
