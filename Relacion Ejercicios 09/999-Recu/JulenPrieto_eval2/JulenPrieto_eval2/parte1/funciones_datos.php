<?php

function inicializarArray(){
    $peliculas = array(
        'codigo' => 0,
        'titulo' => "titulo",
        'categoria' => "cagoria",
        'ano' => 2009,
        'vista' => 0
    );
    $_SESSION["peliculas"] = $peliculas;
}
function mostrarPeliculas(){
    $peliculas = inicializarArray();
}
function borrar(){
    $peliculas = [];
}


function insertar($pelicula){
    array_push($peliculas);
}