<?php

require_once "Publicacion.php";
require_once "MisClases/Publicacion.php";

$p1 = new MiPublicacion("Mikel García, Luis Pérez", 1999, "Plantea", "Aprende PHP", "Érase una vez...");

echo $p1->editorial;
echo $p1->leer();
$p1->escribir(" un centro llamado Egibide.");
echo $p1->leer();