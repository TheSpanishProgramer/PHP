<?php

require_once "Models/Publicacion.php";
use Ejercicio2\Models\Publicacion;

$p1 = new Ejercicio2\Models\Publicacion("Mikel García, Luis Pérez", 1999, "Plantea", "Aprende PHP", "Érase una vez...");
$p1 = new Publicacion("Mikel García, Luis Pérez", 1999, "Plantea", "Aprende PHP", "Érase una vez...");

echo $p1->leer();
$p1->escribir(" un centro llamado Egibide.");
echo $p1->leer();