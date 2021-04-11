<?php


$usuarios = [
        0 => [
            'codigo' => 0,
            'usuario' => 'jvadillo',
            'nombre' => 'Jon',
            'apellidos' => 'Vadillo Romero',
            'email' => 'jvadillo@egibide.org',
            'password' => 1234

        ],
        1 => [
            'codigo' => 1,
            'usuario' => 'jmalvido',
            'nombre' => 'Jaime',
            'apellidos' => 'Mlavido ',
            'email' => 'jmalvido@egibide.org',
            'password' => 4321
        ]
    ];

$_SESSION["usuarios"] = $usuarios;
