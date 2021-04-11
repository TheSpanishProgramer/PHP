<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 03/12/2019
 * Time: 17:04
 */

namespace Ejercicio4\Models;

require_once "Poligono.php";

class Triangulo extends Poligono
{
    function area(){
        return $this->altura * $this->anchura / 2;
    }
}