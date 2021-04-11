#!/bin/php
<?php
/*
* En este ejercicio vamos a aprender: 
*
* 1. Cómo poner un nombre a una constante
* 2. Qué tipo de dato pueden almacenar las constantes
*
* 1. Cómo poner un nombre a una constante
* ---------------------------------------
* Para poner un nombre a una constante debemos seguir la regla que
* determina esta expresión regular ^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$
*
* Esto lo explicamos en el video de PHP guay titulado Etiquetas o identificadores PHP:
*
* https://www.youtube.com/watch?v=Hj_E0Wk2lNE 
*
* La regla es sencilla: los nombres tienen que empezar por una letra o por un 
* guión bajo, y luego pueden ir seguidos por cualquier número de letras, números 
* o guiones bajos.
*
* 2. Qué tipo de dato puede almacena una constante
* ------------------------------------------------
* Las constantes pueden almacenar datos escalares: boolean, integer, float y string. 
* A partir de PHP 5.6 las constantes también pueden almacenar arrays. 
*/

// De acuerdo a lo anterior, algunos nombres de constantes válidos son:

define('Debug', true);
define('age', 18);
define('Amount', 75.25);
define('CuRrEnCy', 'USD');

echo 'El modo debug es: ' . Debug . PHP_EOL;
echo 'La edad predeterminada es: ' . age . PHP_EOL;
echo 'El importe base es: ' . Amount . PHP_EOL;
echo 'La divisa predeterminada es : ' . CuRrEnCy . PHP_EOL; 
echo '-------------------------------------------------------------------' . PHP_EOL;

/*
* Sin embargo, por convención, los nombres de las constantes se escriben en mayúscula.
* Por tanto, en vez de utilizar nombres como los anteriores, deberíamos usar nombres como 
* estos:
*/

define('DEBUG', true);
define('AGE', 18);
define('AMOUNT', 75.25);
define('CURRENCY_01', 'USD');
define('CURRENCY_02', 'EUR');

echo 'El modo debug es: ' . DEBUG . PHP_EOL;
echo 'La edad predeterminada es: ' . AGE . PHP_EOL;
echo 'El importe base es: ' . AMOUNT . PHP_EOL;
echo 'La divisa predeterminada es : ' . CURRENCY_02 . PHP_EOL; 