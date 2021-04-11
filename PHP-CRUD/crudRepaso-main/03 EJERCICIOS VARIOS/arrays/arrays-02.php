#!/bin/php
<?php
/* En este ejercicio...
 * 
 * Vamos a crear 1 array PHP de estudiantes con elementos aleatorios. Ahora las 
 * claves no seran numéricas como antes, sino que serán de tipo string. 
 * 
 * Es muy importante que sepas que las claves de los arrays PHP pueden ser de tipo 
 * entero y de tipo string, y que el valor puede ser de cualquier tipo. Esto ya 
 * lo vimos en el ejercicio anterior.
 * 
 * Al final convertiremos nuestro array PHP a formato JSON y luego utilizamos el 
 * constructor PHP foreach para iterar sobre el mismo. Todo esto con el objetivo 
 * de aprender, para conocer cosas nuevas de PHP.
 */

$students = [];

$names = ['Pepe', 'Marta', 'Gonzalo', 'Juan', 'Emma', 'Sandra', 'Luis'];
$surnames = ['García', 'Sala', 'Martín', 'Smith', 'López'];
$subjects = ['PHP', 'JavaScript', 'HTML5', 'CSS3'];

// Creamos un grupo aleatorio de 10 estudiantes
for($i=0;$i<10;$i++)
{
    $students[] = [
        'name' => $names[rand(0,count($names)-1)],
        'surname' => $surnames[rand(0,count($surnames)-1)],
        'subject' => $subjects[rand(0,count($subjects)-1)]
    ];
}

// Imprimimos nuestro array aleatorio PHP
print_r($students);
// Convertimos el array PHP a formato JSON e imprimimos el resultado
print_r(json_encode($students));

echo PHP_EOL;

// Utilizamos foreach para recorrer el array, elemento por elemento
foreach($students as $key => $value)
{
    echo "{$key}. {$value['name']} {$value['surname']}, {$value['subject']}" . PHP_EOL;
}