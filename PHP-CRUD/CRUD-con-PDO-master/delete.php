<?php

require "conexion.php";
$id = $_GET['id'];
$conexion = $pdo->query("DELETE FROM datos_usuarios WHERE id = $id");

$conexion->execute();

header('location:index.php');