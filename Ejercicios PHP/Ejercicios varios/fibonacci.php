#!/bin/php
<?php
/**
 * Calcula la sucesi�n de Fibonacci hasta $n
 * @param int $n N�mero en�simo de Fibonacci
 * @return array Los $n primeros n�meros de Fibonacci
 */
function fibonacci($n)
{
    $numbers = [1,1];
    for($i=0;$i<$n-2;$i++)
    {
        $last = count($numbers);
        $numbers[] = $numbers[$last-1] + $numbers[$last-2];        
    }
    return $numbers;
}

print_r(fibonacci(7));