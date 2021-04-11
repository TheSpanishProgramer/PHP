<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 03/12/2019
 * Time: 17:03
 */

namespace Ejercicio7\Models;


abstract class Poligono
{
    protected $color, $altura, $anchura;

    public function __construct($color, $altura, $anchura)
    {
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->color = $color;
    }


    public function descripcion()
    {
        // Puede acceder al método abstracto de los hijos.
        return "Soy un poligono de color " . $this->color . " y un area de " . $this->area();
    }

    abstract public function area();

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura): void
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getAnchura()
    {
        return $this->anchura;
    }

    /**
     * @param mixed $anchura
     */
    public function setAnchura($anchura): void
    {
        $this->anchura = $anchura;
    }



}