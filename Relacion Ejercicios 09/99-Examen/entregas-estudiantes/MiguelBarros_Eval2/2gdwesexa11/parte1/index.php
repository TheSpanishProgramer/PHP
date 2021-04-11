<?php
session_start();

$usuarios = [
    "user1"=> [
        "id" => "1",
        "email" => "mbarroso@egbide.org",
        "contrasena" => "123",
        "nombre" => "Miguel",
        "apellidos" => "Barros"
    ],
    "user2" => [
        "id" => "2",
        "email" => "jvadillo@egbide.org",
        "contrasena" => "123",
        "nombre" => "Jon",
        "apellidos" => "Vadillo"
    ],
    "user3" => [
        "id" => "3",
        "email" => "rppedraza@egbide.org",
        "contrasena" => "123",
        "nombre" => "Raul",
        "apellidos" => "Pedraza"
    ]
];

if (isset($_GET["usuario"]) && isset($_GET["contrasena"])) {
    $nombreUsuario= $_GET["usuario"];
    $contrasena = $_GET["contrasena"];

    comprobarUsuarioContrasena($usuarios, $contrasena, $nombreUsuario);
}

function comprobarUsuarioContrasena($usuarios, $contrasena, $nombreUsuario) {
    foreach ($usuarios as $usuario => $clave ) {
        echo $usuario["contrasena"];
        if (array_key_exists($nombreUsuario, $usuarios) && $clave["contrasena"] == $contrasena ) {
            $_SESSION["usuario"] = $usuario["nombre"];
            header("location: mostrarPacientes.php");
        } else {
            header("location: index.php");
        }
    }
}


function mostrarFormulario() { ?>
<html>
<head>

</head>
<body>
<form action="index.php" method="get">
    <h1>Login</h1>
    <p>Introduce un usuario y contraseña válidos</p>

    <input type="text" name="usuario">
    <input type="text" name="contrasena">
    <input type="submit" value="Entrar">
</form>
</body>
</html>
<?php }

mostrarFormulario();
?>



