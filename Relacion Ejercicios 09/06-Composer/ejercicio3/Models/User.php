<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 05/12/2019
 * Time: 10:35
 */

namespace Ejercicio3\Models;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

abstract class User
{
    protected $username;
    protected $nombre;
    protected $apellidos;
    protected $email;
    protected $password;
    protected $ultimo_acceso;

    protected $log;

    public function __construct($username, $nombre, $apellidos, $email, $password, $ultimo_acceso)
    {
        $this->username = $username;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->ultimo_acceso = $ultimo_acceso;

        $this->log = new Logger('name');
        $this->log->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
        // Si hay problemas de escritura, dar permisos chmod 777 a la carpeta y utilizar la siguiente línea:
        // $this->log->pushHandler(new StreamHandler('app.log', 0, Logger::DEBUG, 0777));
        $this->log->debug("Usuario creado");
    }
    public abstract function showActions();

    public function login(){
        $this->log->debug("Ejecutando el método login() por el usuario " . $this->username);
    }

    public function logout(){
        $this->log->debug("Ejecutando el método logout() por el usuario " . $this->username);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
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
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUltimoAcceso()
    {
        return $this->ultimo_acceso;
    }

    /**
     * @param mixed $ultimo_acceso
     */
    public function setUltimoAcceso($ultimo_acceso): void
    {
        $this->ultimo_acceso = $ultimo_acceso;
    }




}