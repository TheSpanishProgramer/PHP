<?php
require "../src/Internacional/Articulo.php";
require "../src/Nacional/Articulo.php";

use Src\{Nacional, Internacional}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: cadetblue;">
    <?php
    $art1 = new Internacional\Articulo();
    $art1->decirNamepace();

    //---------------------------------

    $art2 = new Nacional\Articulo();
    $art2->decirNamepace();
    ?>
</body>
</html>