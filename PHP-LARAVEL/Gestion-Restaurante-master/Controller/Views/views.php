<?php
session_start();
// Importamos Autoloader de Twig
require_once '../Twig/lib/Twig/Autoloader.php';
// Inicializamos Twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../../Views');
$twig = new Twig_Environment($loader); 

// Si no esta logueado volvera a la pantalla de logueo
if (isset($_SESSION["logado"])) {
    if(!$_SESSION["logado"] || !$_SESSION["tipo_usuario"] == "administrador") {
    header("Location: ../logout.php");
    }
} else {
    header("Location: ../logout.php");
}

$data["datos"] = 0;
$data["admin"] = true;

// Dependiendo del tipo de usuario ira a una pagina u otar
switch ($_SESSION["tipo_usuario"]){
    // Si es administrador se renderizara la vista de admnistrados
    case "administrador":
        echo $twig->render("adminview.html.twig", $data);
        break;
    // Si es usuario se le mandara a la pagina de la app
    case "usuario": 
        header("Location: ../App/app.php");
        break;
    // Si es cocina, se le mandara a la pagina de cocina
    case "cocina";
        header("Location: ../Cocina/cocina.php");
        break;
    // Si no es ninguno de los anteriores se le deslogueara y volvera a la pagina de logueo
    default :
        header("Location: ../logout.php");
        break;
}