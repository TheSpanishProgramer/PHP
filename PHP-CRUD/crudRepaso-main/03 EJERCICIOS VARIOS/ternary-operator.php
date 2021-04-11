#!/bin/php
<?php

// Ternary operator example 1
7 > 5 ? $b = 'Hello world' : $c = 'I won\'t be set';

// Print value
if(isset($b)) echo "The value of \$b is $b." . PHP_EOL;
if(isset($c)) echo "The value of \$c is $c." . PHP_EOL;

// Reset vars
$b = null;
$c = null;

// Ternary operator example 2
7 < 100 && false ? $b = (7 + 8) / 3 : $c = true or false;

// Print value
if(isset($b)) echo "The value of \$b is $b." . PHP_EOL;
if(isset($c)) echo "The value of \$c is $c." . PHP_EOL;

// Reset vars
$b = null;
$c = null;

// Ternary operator example 3
$days = 366;
$isLeapYear = ($days === 366) ? true : false;

// Print value
if($isLeapYear) 
{
    echo 'This is a leap year.' . PHP_EOL;
}
else
{
    echo 'This is not a leap year.' . PHP_EOL;
}