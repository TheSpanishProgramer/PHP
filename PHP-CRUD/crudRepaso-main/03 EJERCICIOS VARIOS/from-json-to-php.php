#!/bin/php
<?php
/**
 * En este ejercicio vamos a tomar unos datos codificados en JSON y los vamos a 
 * convertir a un formato manejable por PHP con la función json_decode. Esta 
 * función convierte los datos a objetos stdClass y arrays PHP.
 * 
 * A continuación iteraremos sobre el resultado e imprimiremos la información en
 * la consola. Este ejercicio lo hacemos con PHP CLI para poder centrarnos
 * rápidamente en lo que nos interesa, así no tenemos que codificar ningún 
 * HTML ni CSS, etc.
 * 
 * En resumen, este script toma un JSON e imprime la información que contiene 
 * en formato textual.
 */
$data = '{
    "name": "PHP guay",
    "media": ["Google+", "Tutellus", "Cursopedia"],
    "exercises": {
        "bitwise-operators.php": {
            "difficulty": "medium",
            "lines": "34",
            "size": "1.272 kb",
            "date": "2014-07-02"
        },
        "cookies-http.php": {
            "difficulty": "low",
            "lines": "9",
            "size": "0.146 kb",
            "date": "2014-07-02"
        },
        "fibonacci.php": {
            "difficulty": "medium",
            "lines": "19",
            "size": "0.42 kb",
            "date": "2011-07-07"
        }
    }
}';

$course = json_decode($data);

// Imprimimos $course en formato legible para las personas, para poder ver bien
// en qué consiste esta estructura de datos.
print_r($course);

// Imprimimos el nombre del curso.
echo "$course->name" . PHP_EOL . PHP_EOL;
// Imprimimos los medios donde se imparte el curso.
foreach($course->media as $media)
{
    echo "$media" . PHP_EOL;
}
// Imprimimos los ejercicios del curso.
foreach($course->exercises as $name => $course)
{
    echo PHP_EOL;
    echo "$name" . PHP_EOL;
    foreach($course as $key => $value)
    {
        echo "\t$key: $value" . PHP_EOL;
    }
}
