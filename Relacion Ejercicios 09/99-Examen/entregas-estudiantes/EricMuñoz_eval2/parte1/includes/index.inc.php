<?php
session_start();
$usuarios = array(
    array(
        'id' => 1,
        'usuario' => 'jvadillo',
        'nombre' => 'Jon',
        'apellidos' => 'Vadillo Romero',
        'email' => 'jvadillo@egibide.org',
        'password' => '1234',
    ),
    array(
        'id' => 2,
        'usuario' => 'jmalvido',
        'nombre' => 'Jon',
        'apellidos' => 'Malvido Durango',
        'email' => 'jmalvido@egibide.org',
        'password' => '4321',
    ),
);

if (isset($_GET['usuario']) && !empty($_GET['usuario']) && isset($_GET['password']) && !empty($_GET['password'])) {
    foreach ($usuarios as $usuario) {
        if ($usuario['usuario'] == $_GET['usuario'] && $usuario['password'] == $_GET['password']) {
            $_SESSION['usuario'] = $usuario['nombre'];
            header('location:pacientes.php');
        }
    }
}

