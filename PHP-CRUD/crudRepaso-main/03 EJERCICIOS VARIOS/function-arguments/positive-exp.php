#!/bin/php
<?php
/**
 * Positive exponentiation
 * @param int $b Base
 * @param int $n Power
 * @return int $b ** $n
 */
function power($b, $n=0)
{   
    if($n==0) return 1;
    
    $result = $b;
    for($i=0; $i<$n-1; $i++)
    {
        $result *= $b;
    }
    return $result;
}

echo power(1) . PHP_EOL;        // 1
echo power(2) . PHP_EOL;        // 1
echo power(3) . PHP_EOL;        // 1
echo power(4) . PHP_EOL;        // 1
echo power(5,1) . PHP_EOL;      // 5
echo power(5,2) . PHP_EOL;      // 25
echo power(5,3) . PHP_EOL;      // 125
echo power(0,3) . PHP_EOL;      // 0
echo power(0,0) . PHP_EOL;      // 1
echo power(0) . PHP_EOL;        // 1