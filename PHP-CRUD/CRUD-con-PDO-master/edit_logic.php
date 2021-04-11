<?php
try{
	require "conexion.php";
// Guardamos en variable lo que nos llega por POST del formulario de edit.php
	$id = $_POST['id'];
	$name = $_POST['name'];
	$apell = $_POST['surname'];
	$direc = $_POST['address'];
// Hacemos un update con marcadores
	$conexion = $pdo->prepare("UPDATE `datos_usuarios` SET `nombre`= :name,`apellido`= :apell,`direccion`= :direc WHERE id = $id" );
// asignamos cada marcador a la variable correcta (que hemos creado al principio)
	$conexion->bindValue(':name',$name);
	$conexion->bindValue(':apell',$apell);
	$conexion->bindValue(':direc',$direc);
	$conexion->execute();

	header('location:index.php');
}catch(Exception $e){
	die("Error " . $e->getMessage());
}