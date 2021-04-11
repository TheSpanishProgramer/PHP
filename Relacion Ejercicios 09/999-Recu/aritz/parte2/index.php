<?php
session_start();
require "funciones_db.php";

$dbh = connect();

if (!isset($_SESSION['usuario'])){
    if (isset($_GET['accion']) && $_GET['accion'] == 'login' ){
        $usu = $_GET['usu'];
        $contra = $_GET['contra'];
        $usuarios = selectAllUsuarios($dbh);
        $login = login($usuarios,$usu,$contra);

        if ($login){
            $peliculas = selectAll($dbh);
            require "views/principal.php";
        }else{
            require "views/usuario.php";
        }
    }else{
        require "views/usuario.php";
    }

}else{
    if (isset($_GET['accion'])){
        $accion = $_GET['accion'];
        switch ($accion){
            case 'insert':
                $codi = $_GET['codi'];
                $titu = $_GET['titu'];
                $cate = $_GET['cate'];
                $ano = $_GET['ano'];
                insert($dbh,$codi,$titu,$cate,$ano);
                break;
            case 'update':
                $id = $_GET['id'];
                update($dbh,$id);
                break;
            case 'delete':
                delete($dbh);
                break;
        }
    }
    $peliculas = selectAll($dbh);
    require "views/principal.php";
}

function login($usuarios,$usu,$contra){
    foreach ($usuarios as $usuario){
        if ($usuario['usuario'] == $usu && $usuario['contrasena'] == $contra){
            $_SESSION['usuario'] = $usu;
            return true;
        }
    }
    return false;
}

?>