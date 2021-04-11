<?php
echo "Hola recu!";

require "datos.php";
require "funcionalidades.php";
session_start();

if (!isset($_SESSION['usuarioS'])){
    if (isset($_GET['accion']) && $_GET['accion'] == 'login' ){
        $usu = $_GET['usu'];
        $contra = $_GET['contra'];
        $log = loginU($usuarios,$usu,$contra);
/*        var_dump($log);*/
        if($log){
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
                sessionPelicula();
                $codi = $_GET['codi'];
                $titu = $_GET['titu'];
                $cate = $_GET['cate'];
                $ano = $_GET['ano'];
                insertPeli($codi,$titu,$cate,$ano);

                break;
            case 'update':

                break;
            case 'delete':

                borrarPelis();
                break;

        }
    }
    require "views/principal.php";
}

function loginU ($usuarios,$usu,$contra){
    foreach ($usuarios as  $key =>$usuario){
       /* var_dump($usu);
        var_dump($contra);
        var_dump($key);
        var_dump($usuario['contrasena']);*/
        if ($usuario['contrasena'] == $contra && $key == $usu){
            $_SESSION['usuarioS'] = $usu;
            return true;
        }
    }
    return false;
}









?>