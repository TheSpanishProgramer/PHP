<?php
namespace Egibide\Models;

class Persona {
    private $nombre;
    private $profesion;
    private $edad;

    // Constructor
    public function __construct($nom, $pro, $edad) {
        $this->nombre = $nom;
        $this->profesion = $pro;
        $this->edad = $edad;
    }
    public function presentarse() {
        return "Hola, me llamo " . $this->nombre . " y soy " . $this->profesion . ".<br>";
    }

    public function __toString() {
        return "<hr><b>$this->nombre</b><br>
          Profesión: $this->profesion<br>
          Edad: $this->edad<hr>";
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * @param mixed $profesion
     */
    public function setProfesion($profesion): void
    {
        $this->profesion = $profesion;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     */
    public function setEdad($edad): void
    {
        $this->edad = $edad;
    }


}