#!/bin/php
<?php
$students = array('Antonio', 'Eva', 'Fernando', 'Jordi', 'Luis', 'Sandra');
 
array_walk($students, function($student) {
    echo "Hola $student" . PHP_EOL;
});