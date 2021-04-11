<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author duveral
 */

abstract class  Animal {                                                                                                                                            
// Abstracto porque no se pueden crear objetos directamente, sino, perro, canario...

// Atributos de clase (estatico porque no es para cambiarlo continuamente.)
    private static $numAnimales = 0;

// Atributos de instancia (o de objeto)
    private $nombre;
    private $sexo;
    private $color;
    private $raza;
    
// Constructor
    function __construct($nombre, $sexo, $color, $raza) {
        $this->nombre = $nombre;
        $this->sexo = $sexo;
        $this->color = $color;
        $this->raza = $raza;
        self::$numAnimales++;
    }
// Getter and Setter
    static function getNumAnimales() {
        return self::$numAnimales;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getColor() {
        return $this->color;
    }

    function getRaza() {
        return $this->raza;
    }
    
    static function setNumAnimales($numAnimales) {
        self::$numAnimales = $numAnimales;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setRaza($raza) {
        $this->raza = $raza;
    }

// Metodos de instancia (objeto)
    public function actionAparea() {
        return $this->nombre . " se esta procreando.";
    }

    public function actionCorre() {
        return $this->nombre . " esta corriendo.";
    }

    public function actionLava() {
        return $this->nombre . " saca la lengua para lavase.";    
    }

// To String
    public function __toString() {
        return "<br>======" .
            "<br>Nombre: " . $this->getNombre() . 
            "<br>Sexo: " . $this->getSexo() .
            "<br>Color: " . $this->getColor() .
            "<br>Raza: " . $this->getRaza();
    }


}
