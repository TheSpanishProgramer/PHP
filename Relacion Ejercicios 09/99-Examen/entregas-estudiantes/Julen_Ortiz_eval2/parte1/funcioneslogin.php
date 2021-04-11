<?php
$usuarios=[
    "usuario1"=>[
        "usuario"=>"jvadillo",
        "nombre"=>"Jon",
        "apellidos"=>"Vadillo Romero",
        "correo"=>"jvadillo@egibide.org",
        "contrasena"=>"1234"
    ],
    "usuario2"=>[
        "usuario"=>"jmalvido",
        "nombre"=>"Jaime",
        "apellidos"=>"Malvido Durango",
        "correo"=>"jmalvido@egibide.org",
        "contrasena"=>"4321"
    ]
];

if(isset($_GET["user"],$_GET["password"])){
    $user = $_GET["user"];
    $password = $_GET["password"];
    $login = 0;
    foreach($usuarios as $key){
        if($key{'usuario'}==$user){
            if($key{'contrasena'}==$password){
                session_start();
                $_SESSION{"usuario"} = $user;
                $_SESSION{"contrasena"} = $password;
                $login = 1;
                require "pacientes.php";

                //No he podido hacer la redireccion de otra manera y al final la he puesto mediante un require -->

            }
        }


}
else {
    require "login.php";
}


