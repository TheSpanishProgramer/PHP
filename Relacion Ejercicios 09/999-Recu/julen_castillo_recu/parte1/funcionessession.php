<?php

function comprobarLogin($usuarios,$user,$pass){

    if (isset($usuarios[$user])){
        if($usuarios[$user]["contrasena"] == $pass)
        return true;
    } else{
        return false;
    }
}

function comprobarAccion($accion){

    switch ($accion){
        case "nuevo":
            insertarPelicula($_GET["codigo"],$_GET["titulo"],$_GET["categoria"],$_GET["año"]);
            break;
        case "marcar":
            marcarVista($_GET["codigo"]);
            break;
        case "borrar":
            borrarPeliculas();
            break;
         default:
            break;
    }

}

function inicializarPeliculas(){
    $_SESSION["peliculas"] = array();

}


function insertarPelicula($codigo,$titulo,$categoria,$año){
array_push($_SESSION["peliculas"],array(
        "codigo"=>$codigo,
        "titulo"=>$titulo,
        "categoria"=>$categoria,
        "año"=>$año,
        "vista"=>"0"
));
}


function marcarVista($codigo){
    $index = 0;
    foreach($_SESSION["peliculas"] as $pelicula){
        if ($pelicula["codigo"] == $codigo){
            $_SESSION["peliculas"][$index]["vista"] = 1;
        }

        $index++;
    }


}

function borrarPeliculas(){
    $_SESSION["peliculas"] = array();
}
?>