<?php

function comprobarLogin($usuarios, $usuario, $password){
    if(isset($usuarios[$usuario])){
        if($usuarios[$usuario]['contrasena'] == $password){
            return true;
        }
    }
    return false;
}

function inicializarArrayPeliculas(){
    $_SESSION['peliculas'] = [];
}

function insertarPelicula($codigo, $titulo, $year, $categoria, $vista){
    $pelicula = [
        "codigo" => $codigo,
        "titulo" => $titulo,
        "year" => $year,
        "categoria" => $categoria,
        "vista" => $vista
    ];
    array_push($_SESSION['peliculas'], $pelicula);
}

function modificarPelicula($codigo){
    $index = 0;
    foreach ($_SESSION['peliculas'] as $pelicula){
        if($pelicula['codigo'] == $codigo){
            $_SESSION['peliculas'][$index]['vista'] = 1;
        }
        $index++;
    }
}

function borrarPeliculas(){
    $_SESSION['peliculas'] = [];
}