<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 03/12/2019
 * Time: 17:03
 */

namespace Ejercicio4\Models;

require_once "Poligono.php";

class Cuadrado extends Poligono
{
    function area(){
        return $this->anchura * $this->altura;
    }

}