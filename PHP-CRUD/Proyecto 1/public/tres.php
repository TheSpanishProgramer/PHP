<?php
    spl_autoload_register(function($clase) {
        require_once "../src//$clase.php";
        //require_once "../src/".$clase.'php';
    })
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>POO_1</title>
</head>
<body style="background: cadetblue;">
    <h3 class="my-3 text-center">Ejemplo POO</h3>
    <div class="container mt-3">
        <?php
        // $tv1 = new TV();
        // $tv1->cod=15000;
        // $tv1->nombre= "TV Samsung 45 pulgadas HCXXX";
        // $tv1->nom_corto="TV Samsung 45";
        // $tv1->pulgadas=45;
        // $tv1->resolucion="4K";
        $tele = new TV(1500,"TV Samsung 45 pulgadas HCXXX","TV Samsung 45", 1234.56, 45, "4K");
        echo $tele;
        //1. get_parent_class
        echo "<br>". get_parent_class($tele);
        //2. is_subclass_of()
        if (is_subclass_of($tele, 'Articulo')) {
            echo "<br>Cierto";
        }
        ?>
    </div>
</body>
</html>