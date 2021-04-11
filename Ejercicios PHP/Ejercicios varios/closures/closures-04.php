#!/bin/php
<?php
$students = array('Antonio', 'Eva', 'Fernando', 'Jordi', 'Luis', 'Sandra');
$greetings = array('Hola', 'Buenas tardes', 'Hasta luego', 'Bienvenid@');
 
array_walk($students, function($student) use ($greetings) {
    echo $greetings[array_rand($greetings)] . ' ' . $student . PHP_EOL;
});