#!/bin/php
<?php
require 'Alice.php';
require 'Bob.php';

use Alice\Greetings as A;
use Bob\Greetings as B;

echo A::hello() . PHP_EOL;
echo B::hello() . PHP_EOL;
echo A::bye() . PHP_EOL;
echo B::bye() . PHP_EOL;