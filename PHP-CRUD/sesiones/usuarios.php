<?php
    $usuarios=[
        ["admin", hash("sha256", "secreto"), 0],
        ["pepe", hash("sha256", "passPepe"), 1],
        ["juan", hash("sha256", "passJuan"), 1]
    ];

    //var_dump($usuarios);