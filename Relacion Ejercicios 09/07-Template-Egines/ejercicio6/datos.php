<?php
use Ejercicio5\Models\Zapatilla;

$zapatillas = [
    $zapatilla = new Zapatilla(1, "Adidas", "MARQUEE BOOST", "Zapatilla de baloncesto", "140€"),
    $zapatilla = new Zapatilla(2, "Nike", "Messi X7 Plus", "Zapatilla de fútbol", "99"),
    $zapatilla = new Zapatilla(3, "Nike", "MARQUEE BOOST", "Zapatilla de baloncesto", "135€"),
    $zapatilla = new Zapatilla(4, "Rebook", "Air Jordan V1", "Zapatilla de baloncesto", "120€"),
    $zapatilla = new Zapatilla(5, "Rebook", "Air Jordan V2", "Zapatilla de baloncesto", "125€"),
    $zapatilla = new Zapatilla(6, "Rebook", "Air Jordan V3", "Zapatilla de baloncesto", "129€"),
    $zapatilla = new Zapatilla(7, "Nike", "CR7 X Alpha", "Zapatilla de fútbol", "90€"),
    $zapatilla = new Zapatilla(8, "Nike", "Serrano Augment", "Zapatilla de fútbol", "140€"),
    $zapatilla = new Zapatilla(9, "Adidas", "Fastpower-4", "Zapatilla de baloncesto", "114€"),
    $zapatilla = new Zapatilla(10, "Adidas", "Getpower-1", "Zapatilla de baloncesto", "130€")
];
function getById($zapatillas, $id) {
    foreach ($zapatillas as $zapatilla){
        if($zapatilla->getId() == $id) {
            return $zapatilla;
        }
    }
}