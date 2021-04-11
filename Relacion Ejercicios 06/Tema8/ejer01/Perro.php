<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perro
 *
 * @author duveral
 */
include_once 'Mamifero.php';
class  Perro extends Mamifero {

// Atributos de instancia
    private $raboCortado;

// Constructor
    function __construct($nombre,$sexo,$color,$raza,$numPatas,$raboCortado = "no") {
        parent::__construct($nombre, $sexo, $color, $raza,$numPatas);
        $this->raboCortado = $raboCortado;
    }

// Getter and Setter
    function getRaboCortado() {
        return $this->raboCortado;
    }

    function setRaboCortado($raboCortado) {
        $this->raboCortado = $raboCortado;
    }

// Metodos
    public function actionLadra() {
        return $this->getNombre() . "hace GUAU GUAU.";
    }

// To String
    public function __toString() {
        return  parent::__toString() . "<br>Rabo cortado: " . $this->getRaboCortado();
    }


}
