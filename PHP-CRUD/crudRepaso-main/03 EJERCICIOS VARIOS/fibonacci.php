#!/bin/php
<?php
/**
 * Calcula la sucesión de Fibonacci hasta $n
 * @param int $n Número enésimo de Fibonacci
 * @return array Los $n primeros números de Fibonacci
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