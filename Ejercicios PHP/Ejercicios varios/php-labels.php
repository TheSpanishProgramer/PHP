#!/bin/php
<?php
// See ASCII table at http://www.ascii-code.com/
$labels = array('98-hello', 'hello-98', '?Robert', 'RobertÇ', 'bob', 'b ob', 'æÆ╣Ã');

foreach($labels as $label)
{
    if(preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $label)) 
    {
        echo "$label es una etiqueta válida." . PHP_EOL;
    }
    else
    {
        echo "$label no es una etiqueta PHP válida." . PHP_EOL;
    }
}