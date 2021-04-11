<!DOCTYPE html>
<?php
require "../vendor/autoload.php";
use Carbon\Carbon;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Ejemplo Composer</title>
</head>
<body style="background-color: darksalmon;">
    <h3 class="my-3 text-center">Fechas de prueba</h3>
    <div class="container mt-3">
        <?php
        echo "Hoy es: ".Carbon::now();
        echo "<p>Tienes: ".Carbon::createFromDate(2001,03,15)->age. " años </p>";
        ?>
    </div>
</body>
</html>