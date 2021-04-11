#!/bin/php
<?php
if (!@include 'foo.php')
{
    echo 'Hola abuelita e hijitos. Yo, PHP, no he conseguido incluir un archivo. ¿Qué os parece?' . PHP_EOL;
}

print_r($php_errormsg);