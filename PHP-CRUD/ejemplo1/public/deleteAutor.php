<?php
session_start();
if (!isset($_POST['id'])) {
    header('Location:autores.php');
}
require "../vendor/autoload.php";

use Clases\Autores;

$id = ($_POST['id']);
$autor = new Autores();
$autor->setId_autor($id);
$autor->delete();
$autor = null;
$_SESSION['mensaje'] = "Autor borrado correctamente";
header("Location:autores.php");
