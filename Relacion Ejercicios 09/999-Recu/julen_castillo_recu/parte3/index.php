<?php
session_start();

include_once "funcionesbase.php";

if (isset($_SESSION["usuario"])){

    require_once "views/peliculas.php";


    if (isset($_GET["accion"])){
        comprobarAcciones($_GET["accion"]);
    }


}

else if(isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["contrasena"]) && !empty($_POST["contrasena"])) {


    $data =[
        "usuario"=>$_POST["usuario"],
        "contrasena"=>$_POST["contrasena"]
    ];

    $login = comprobarLoginBaseDatos($data);

    if ($login) {
        $peliculas = getAll();
        $_SESSION["usuario"] = $_POST["usuario"];
        require_once "views/peliculas.php";
        }
    else {
        require_once "views/login.php";
    }
}
else{
    require_once "views/login.php";
}

function comprobarAcciones($accion){

        switch ($accion){
            case "nuevo":
                $data =[
                    "codigo"=>$_GET["codigo"],
                    "titulo"=>$_GET["titulo"],
                    "categoria"=>$_GET["categoria"],
                    "año"=>$_GET["año"]
                ];
                insertarPeliculaBase($data);
                break;
            case "marcar":
               /* $data=[
                    "codigo"=>$_GET["codigo"]
                ];
               marcarVistaBase($data);*/
                break;
            case "borrar":
               // borrarPeliculas();
                break;
            default:
                break;
        }

    }

?>