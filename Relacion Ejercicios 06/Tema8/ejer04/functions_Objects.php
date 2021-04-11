<?php

/* 
 * Realizado en NetBeans.
 * Autor : Julian Garcia Castillo
 * Año: 2016
 */


// Encuentra un objeto en un array, desde un ID.
function findObject($arrayObjetos, $getAtributo, $id){
    foreach ($arrayObjetos as $key => $value){
        if ($value->$getAtributo() == $id){
            $objetoSelect=($arrayObjetos[$key]);
        }
    }
    return $objetoSelect;
}

// Encuentra un objeto en un array y lo borra del array, desde un ID.
function removeObject($arrayObjetos, $getAtributo, $id){
    foreach ($arrayObjetos as $key => $value){
        if ($value->$getAtributo() == $id){
            unset($arrayObjetos[$key]);
        }
    }
    return $arrayObjetos;
}

