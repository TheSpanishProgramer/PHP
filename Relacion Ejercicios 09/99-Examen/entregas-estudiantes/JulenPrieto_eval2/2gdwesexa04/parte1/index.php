<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "Hola examen!";

$user = "";
$password = "";

$usuarios =[
  "usu1" => [
      "nombre" => "Jon",
      "apellidos" => "Vadillo Romero",
      "email" => "jvadillo@egibide.org",
      "user" => "jvadillo",
      "password" => "1234"
  ],
    "usu2" => [
        "nombre" => "Jaime",
        "apellidos" => "Malvido Durango",
        "email" => "jmalvido@egibide.org",
        "user" => "jmalvido",
        "password" => "4321"
    ]
];
function comprobarLogin($usuarios,$user,$password){

    for($x =0; $x < count($usuarios); $x++){
        if($user == $usuarios.["user"] && $password = $usuarios.["password"]){
            //si se encuentra pasa a la pagina "pacientes.php"

        }else{
            //si no lo encuentra no pasa nada
        }
    }


}

?>

<div id="login">
    <h1> Login</h1>
    <h3>Introduce un usuario y contraseña válidos (e.g.:jvadillo / 1234)</h3>

    <form action="index.php" method="post">
        <input type="text" name="user" id="user" placeholder="Usuario"/>
        <input type="password" name="password" id="password" placeholder="Password"/>
        <input type="submit" name="entrar" id="entrar" value="Entrar"/>
    </form>
</div>


</body>
</html>