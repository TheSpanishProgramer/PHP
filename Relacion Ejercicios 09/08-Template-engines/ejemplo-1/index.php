<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use duncan3dc\Laravel\Blade;

echo Blade::render("welcome");

//$blade = new BladeInstance("./views");

//echo $blade->render("welcome");

