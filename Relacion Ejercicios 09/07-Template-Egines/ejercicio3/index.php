<?php

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;
use Ejercicio3\Models\Zapatilla;

$zapatillas = [
    $zapatilla = new Zapatilla("Adidas", "MARQUEE BOOST", "Zapatilla de baloncesto", "140€"),
    $zapatilla = new Zapatilla("Nike", "Messi X7 Plus", "Zapatilla de fútbol", "99"),
    $zapatilla = new Zapatilla("Nike", "MARQUEE BOOST", "Zapatilla de baloncesto", "135€"),
    $zapatilla = new Zapatilla("Rebook", "Air Jordan V1", "Zapatilla de baloncesto", "120€"),
    $zapatilla = new Zapatilla("Rebook", "Air Jordan V2", "Zapatilla de baloncesto", "125€"),
    $zapatilla = new Zapatilla("Rebook", "Air Jordan V3", "Zapatilla de baloncesto", "129€"),
    $zapatilla = new Zapatilla("Nike", "CR7 X Alpha", "Zapatilla de fútbol", "90€"),
    $zapatilla = new Zapatilla("Nike", "Serrano Augment", "Zapatilla de fútbol", "140€"),
    $zapatilla = new Zapatilla("Adidas", "Fastpower-4", "Zapatilla de baloncesto", "114€"),
    $zapatilla = new Zapatilla("Adidas", "Getpower-1", "Zapatilla de baloncesto", "130€")
];

echo Blade::render("listado", [ "listado_zapatillas" => $zapatillas]);