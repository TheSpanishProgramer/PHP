<?php
if(!isset($_POST['id'])){
    header("Location:index.php");
    die();
}
require "../vendor/autoload.php";
use Clases\Articulos;
$id=$_POST['id'];
$articulo=new Articulos();
$articulo->setId($id);
$articulo->delete();
$articulo=null;
$_SESSION['mensaje']="Artículo borrado correctamente";
header("Location:index.php");

