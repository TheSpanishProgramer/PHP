<?php

$config = require_once 'config.php';

//Intentamos conectar con la bbdd mediante el TRY
try{
	$url = $config['db']['url'];
	//conexion
	$pdo = new PDO ("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}", $config['db']['user'], $config['db']['pass']);

	//atributos para luego poder capturar la exception

	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	//capturamos la excepcion (en caso de que haya) y mostramos el mensaje

}catch(Exception $e){

	die("Error " . $e->getMessage());
}