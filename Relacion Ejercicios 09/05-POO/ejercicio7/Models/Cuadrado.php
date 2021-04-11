<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 03/12/2019
 * Time: 17:03
 */

namespace Ejercicio7\Models;

require_once "Poligono.php";

class Cuadrado extends Poligono
{
    function area(){
        if($this->anchura < 0 || $this->anchura < 0) {
            // Al estar dentro de un namespace, que utilizar \Exception para referirnos al root namespace
            // Si no intentaría buscar la clase Exception en en namespace actual.
            throw new \Exception("Uno de los lados es negativo.");
        }
        return $this->anchura * $this->altura;
    }
}