<?php
require_once '../vendor/slim/slim/Slim/Slim.php';

use \Slim\Slim;
Slim::registerAutoloader();
$app = new Slim(array('debug' => true));

$app->get('/hello', function () {
    echo 'Hello!';
});

$app->get('/bye', function () {
    echo 'See you!';
});

$app->run();