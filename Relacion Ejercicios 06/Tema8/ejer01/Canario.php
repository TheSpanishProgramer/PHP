<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Canario
 *
 * @author duveral
 */
include_once 'Ave.php';
class  Canario extends Ave {

// Constructor
    function __construct($nombre,$sexo,$color,$raza,$longPico) {
        parent::__construct($nombre, $sexo, $color, $raza,$longPico);
    }

// Metodos
    public function actionCanta() {
        return $this->getNombre() . " canta para llamar sus amigos";
    }

// To String
    public function __toString() {
        return  parent::__toString();
    }


}
