#!/bin/php
<?php
/**
 * Devuelve una letra a-z aleatoria 
 * @param array $exceptions Letras que queremos excluir
 * @return string Una letra aleatoria
 */
function randLetter(array $exceptions)
{
    do
    {
        $letter = chr(rand(97,122));
    } while(in_array($letter, $exceptions));
    
    return $letter;
}

echo randLetter(array('g', 'j', 's')) . PHP_EOL;