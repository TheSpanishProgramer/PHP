#!/bin/php
<?php
function foo($month=8,$year=2014)
{   
    return "mes $month de $year";
}

echo foo() . PHP_EOL;           // mes 8 de 2014 (mes actual)
echo foo(10) . PHP_EOL;         // mes 10 de 2014
echo foo(1,1900) . PHP_EOL;     // mes 1 de 1900