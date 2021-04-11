<?php

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;
use Ejercicio2\Models\Zapatilla;

$zapatilla = new Zapatilla("Adidas", "MARQUEE BOOST", "Zapatilla de baloncesto", "140€");
echo Blade::render("detalle", [ "zapatilla" => $zapatilla]);