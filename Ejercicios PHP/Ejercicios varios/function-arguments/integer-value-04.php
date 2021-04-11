#!/bin/php
<?php
function foo($day=11,$month=8,$year)
{   
    return "dia $day del mes $month de $year";
}

echo foo(1900) . PHP_EOL; // Warning: Missing argument 3 for foo()