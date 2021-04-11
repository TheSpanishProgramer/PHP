<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 04/12/2019
 * Time: 7:50
 */

namespace Ejercicio5\Models;


class Persona
{
    public static $personasEnElMundo = 0;

    public function __construct()
    {
        self::$personasEnElMundo++;
    }

    public function getPersonasEnElMundo()
    {
        return self::$personasEnElMundo;
    }
}