<?php
try{
	require "conexion.php";
	
// Guardamos en variable lo que nos llega por POST del formulario de index.php (para insertar un nuevo dato)
	$name = $_POST['name'];
	$apell = $_POST['surname'];
	$direc = $_POST['address'];

// Hacemos un insert con marcadores
	$conexion = $pdo->prepare("INSERT INTO `datos_usuarios`(`nombre`, `apellido`, `direccion`) VALUES (:name,:apell,:direc)");

// asignamos cada marcador a la variable correcta (que hemos creado al principio)
	$conexion->bindValue(':name',$name);
	$conexion->bindValue(':apell',$apell);
	$conexion->bindValue(':direc',$direc);
	$conexion->execute();

	header('location:index.php');
}catch(Exception $e){
	die("Error " . $e->getMessage());
}