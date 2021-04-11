<?php include_once("partitials/header.php") ?>

<h1>PELICULAS</h1>

<form action="index.php" method="post">
    <input type="hidden" id="accion" name="accion" value="insert"/>
    <input type="text" id="codigo" name="codigo" placeholder="Codigo" />
    <input type="text" id="titulo" name="titulo" placeholder="Titulo" />
    <input type="text" id="categoria" name="categoria" placeholder="Categoria" />
    <input type="text" id="ano" name="ano" placeholder="Año" />
    <input type="submit" id="insertar" name="insertar" value="Insertar"/>
</form>
<br><br>

<table border="1">
    <tr>
        <th>CODIGO</th>
        <th>TITULO</th>
        <th>CATEGORIA</th>
        <th>AÑO</th>
        <th>¿VISTA?</th>
        <th>VER</th>
    </tr>
    <?php
    var_dump($_SESSION["peliculas"]);
    $peliculas = $_SESSION["peliculas"];

        foreach($peliculas as $pelicula){
            '<tr>'.
                '<td>'.$pelicula["codigo"].'</td>'.
                '<td>'.$pelicula["titulo"].'</td>' .
                '<td>'.$pelicula["categoria"].'</td>' .
                '<td>'.$pelicula["ano"].'</td>' .
                '<td>'.$pelicula["vista"].'</td>' .
                '<td>'. '<a href="#">VER</a>' .'</td>'
            .'</tr>';
        }


    ?>
</table>
<br><br>
<a href="index.php?accion=borrar">Borrar</a>

<?php include_once("partitials/footer.php") ?>
