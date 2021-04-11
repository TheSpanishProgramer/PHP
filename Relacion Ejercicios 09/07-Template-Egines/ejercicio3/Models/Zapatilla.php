<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 08/12/2019
 * Time: 16:38
 */

namespace Ejercicio3\Models;


class Zapatilla
{
    private $marca;
    private $modelo;
    private $tipo;
    private $precio;

    /**
     * Zapatilla constructor.
     * @param $marca
     * @param $modelo
     * @param $tipo
     * @param $precio
     */
    public function __construct($marca, $modelo, $tipo, $precio)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->tipo = $tipo;
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

}