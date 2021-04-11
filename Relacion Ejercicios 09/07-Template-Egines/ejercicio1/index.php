<?php

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;

$nombre = "Amaia";
echo Blade::render("welcome", [ "nombre" => $nombre]);