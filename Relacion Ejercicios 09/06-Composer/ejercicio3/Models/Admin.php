<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 05/12/2019
 * Time: 10:38
 */

namespace Ejercicio3\Models;


class Admin extends User
{

    private $admin_level;

    /**
     * Admin constructor.
     * @param $admin_level
     */
    public function __construct($username, $nombre, $apellidos, $email, $password, $ultimo_acceso, $admin_level)
    {
        parent::__construct($username, $nombre, $apellidos, $email, $password, $ultimo_acceso);
        $this->admin_level = $admin_level;
    }

    public function showActions()
    {
        $this->log->debug("Ejecutando el método showActions() como ADMIN por el usuario " . $this->username);
    }

    public function desactivarUsuario(){
        $this->log->debug("Ejecutando el método desactivarUsuario() por el usuario " . $this->username);
    }
}