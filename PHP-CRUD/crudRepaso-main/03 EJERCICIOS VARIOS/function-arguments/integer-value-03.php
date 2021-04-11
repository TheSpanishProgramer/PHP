#!/bin/php
<?php
function foo($day=11,$month=8,$year=2014)
{   
    return "dia $day del mes $month de $year";
}

echo foo() . PHP_EOL; // dia 11 del mes 8 de 2014