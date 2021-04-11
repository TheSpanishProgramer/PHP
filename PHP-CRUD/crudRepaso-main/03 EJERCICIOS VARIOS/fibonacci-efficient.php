#!/bin/php
<?php
/**
 * Calcula la sucesión de Fibonacci hasta $n
 *
 * Este algoritmo es más eficiente que fibonacci.php,
 * el ejercicio que codificamos tan rápidamente en pocos 
 * segundos en http://www.youtube.com/watch?v=iThjUV66fMU
 *  
 * Esta variante requiere que entiendas muy bien 
 * cómo funcionan los bucles.
 *
 * Como dijimos en aquel video, lo importante es el número 
 * de veces que se ejecuta el cuerpo del bucle. En este caso
 * podemos empezar con $i=2, de modo que el índice nos sirve 
 * para llevar el conteo de los elementos que hemos añadido 
 * a $numbers.
 *
 * Así nos ahorramos tener que contar el número de elementos
 * en cada iteración como hicimos en fibonacci.php con 
 * la instrucción PHP: $last = count($numbers);
 *
 * @param int $n Número enésimo de Fibonacci
 * @return array Los $n primeros números de Fibonacci
 */
function fibonacci($n)
{
    $numbers = [1,1];
    for($i=2;$i<$n;$i++)
    {        
        $numbers[] = $numbers[$i-1] + $numbers[$i-2];        
    }
    return $numbers;
}

print_r(fibonacci(10));