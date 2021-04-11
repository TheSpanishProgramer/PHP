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
class  Ave extends Animal {

// Atributos de instancia
    private $longPico;

// Constructor
    function __construct($nombre,$sexo,$color,$raza,$longPico) {
        parent::__construct($nombre, $sexo, $color, $raza);
        $this->longPico = $longPico;
    }

// Getter and Setter
    function getLongPico() {
        return $this->longPico;
    }

    function setLongPico($longPico) {
        $this->longPico = $longPico;
    }

// Metodos
    public function actionVolar() {
        return $this->getNombre() . " no quiere volar mas.";
    }

    public function actionPiar() {
        return "Soy un " . $this->getRaza() . ", y digo PIO.";
    }

    public function actionBeber() {
        return $this->getNombre() .  " esta bebiendo agua.";
    }
// To String
    public function __toString() {
        return  parent::__toString() . "<br>Longitud pico: " . $this->getLongPico();
    }


}
