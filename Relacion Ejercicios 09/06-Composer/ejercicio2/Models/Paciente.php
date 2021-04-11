<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 04/12/2019
 * Time: 21:18
 */

namespace Ejercicio2\Models;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

class Paciente
{
    private $nombre, $apellidos, $edad;
    private $log;

    public function __construct($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;

        $this->log = new Logger('name');
        $this->log->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
        // Si hay problemas de escritura, dar permisos chmod 777 a la carpeta y utilizar la siguiente línea:
        // $this->log->pushHandler(new StreamHandler('app.log', 0, Logger::DEBUG, 0777));

    }

    public function enfermar(){
        $this->log->debug('Estoy enfermando...');
    }

    public function curar(){
        $this->log->debug('Me he curado!');
    }

}