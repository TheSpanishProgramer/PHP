<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 05/12/2019
 * Time: 10:42
 */

namespace Ejercicio3\Models;


class RegularUser extends User
{

    private $empresa;
    private $ciudad;

    /**
     * RegularUser constructor.
     * @param $empresa
     * @param $ciudad
     */
    public function __construct($username, $nombre, $apellidos, $email, $password, $ultimo_acceso, $empresa, $ciudad)
    {
        parent::__construct($username, $nombre, $apellidos, $email, $password, $ultimo_acceso);

        $this->empresa = $empresa;
        $this->ciudad = $ciudad;
    }

    public function editarPerfil(){
        $this->log->debug("Ejecutando el método editarPerfil() por el usuario " . $this->username);
    }

    public function showActions()
    {
        $this->log->debug("Ejecutando el método showActions() como REGULAR_USER por el usuario " . $this->username);
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa): void
    {
        $this->empresa = $empresa;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad): void
    {
        $this->ciduad = $ciudad;
    }


}