<?php

function sessionPelicula(){
    if (!isset($_SESSION['pelicula'])){
        $_SESSION['pelicula'] = array();
    }
}

function insertPeli($codigo,$titulo,$categoria,$ano){

     //   $_SESSION['pelicula'] = array(['codigo'=>$codigo,'titulo'=>$titulo,'categoria'=>$categoria,'ano'=>$ano,'vista'=>0]);

        /* CODIGO JON*/
    $pelicula = [
        "codigo" => $codigo,
        "titulo" => $titulo,
        "ano" => $ano,
        "categoria" => $categoria,
        "vista" => 0
    ];
    array_push($_SESSION['pelicula'], $pelicula);

}

function verPeli($id){

}

function borrarPelis(){
    $_SESSION['pelicula'] =array();

}





?>