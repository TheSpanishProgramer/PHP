#!/bin/php
<?php
function foo($n=2014)
{   
    return "Estamos en $n";
}

echo foo() . PHP_EOL;       // Estamos en 2014
echo foo(1900) . PHP_EOL;   // Estamos en 1900