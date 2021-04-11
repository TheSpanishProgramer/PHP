<!DOCTYPE html>
<?php
require "../vendor/autoload.php";
$faker = Faker\Factory::create('es_ES');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Ejemplo Composer</title>
</head>
<body style="background-color: darksalmon;">
    <h3 class="my-3 text-center">Datos de prueba</h3>
    <div class="container mt-3">
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">UUID</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nombre</th>
      <th scope="col">Mail</th>
      <th scope="col">Ciudad</th>
    </tr>
  </thead>
  <tbody>
      <?php
      for ($i=0; $i < 10; $i++) {
          $apellidos =$faker->lastName;
          $apellidos2=$faker->lastName;
          $nombre = $faker->firstName;
          $usu = strtolower($apellidos). "." . strtolower($nombre);
        echo "<tr>\n";
      echo "<th scope='row'>{$faker->uuid}</th>\n";
      echo "<td>$apellidos, $apellidos2</td>\n";
      echo "<td>$nombre</td>\n";
      echo "<td>$usu@{$faker->freeEmailDomain}</td>\n";
      echo "<td>{$faker->city}</td>\n";
      echo "</tr>\n";
      }
    ?>
  </tbody>
</table>
    </div>
</body>
</html>