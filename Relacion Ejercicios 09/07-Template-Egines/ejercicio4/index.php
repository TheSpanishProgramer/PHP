<?php

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;
require "datos.php";

$tienda = "ZAPAPLUS";
echo Blade::render("listado", [ "tienda" => $tienda,"listado_zapatillas" => $zapatillas]);