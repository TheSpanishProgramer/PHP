#!/bin/php
<?php
/*
* En este ejercicio vamos a aprender: 
*
* 1. Otra forma de definir las constantes a partir de PHP 5.3.
* ------------------------------------------------------------
* En el ejercicio anterior hemos definido las constantes con define, 
* pero a partir de PHP 5.3. también se pueden definir con la palabra 
* reservada const, esto es, con la misma sintaxis que se utiliza para 
* crear constantes de clase.
*/

const DEBUG = true;
const AGE = 18;
const AMOUNT = 75.25;
const CURRENCY_01 = 'USD';
const CURRENCY_02 = 'EUR';

echo 'El modo debug es: ' . DEBUG . PHP_EOL;
echo 'La edad predeterminada es: ' . AGE . PHP_EOL;
echo 'El importe base es: ' . AMOUNT . PHP_EOL;
echo 'La divisa predeterminada es : ' . CURRENCY_02 . PHP_EOL; 
echo '----------------------------------------------------------' . PHP_EOL;

/*
* Sin embargo, no es exactamente lo mismo declarar una constante con define
* que declararla con const.
*
* Por ejemplo, con define podemos definir constantes dentro de bucles, 
* sentencias condicionales y funciones, pero esto no lo podemos hacer con 
* const.
*
* Además, con define podemos utilizar expresiones en el momento de declarar
* las constantes, mientras que con const no podemos hacerlo.
*/

define('A', 7*6);
define('B', 'Hola ' . 'que tal');
define('C', __FILE__);

echo A . PHP_EOL;
echo B . PHP_EOL;
echo C . PHP_EOL;