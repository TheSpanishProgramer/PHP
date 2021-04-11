<?php include_once("partitials/header.php") ?>

<h1>PELICULAS</h1>

<form action="index.php" method="post">
    <input type="hidden" id="accion" name="accion" value="insert"/>
    <input type="text" id="codigo" name="codigo" placeholder="Codigo" />
    <input type="text" id="titulo" name="titulo" placeholder="Titulo" />
    <input type="text" id="categoria" name="categoria" placeholder="Categoria" />
    <input type="text" id="ano" name="ano" placeholder="Año" />
    <input type="submit" id="insertar" name="insertar" value="insert"/>
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
    $peliculas = selectAll($dbh);
    //var_dump($peliculas);
    foreach ($peliculas as $pelicula){
        echo '<tr>'.
                    '<td>'.$pelicula->codigo.'</td>' .
                    '<td>'.$pelicula->titulo.'</td>' .
                    '<td>'.$pelicula->categoria.'</td>' .
                    '<td>'.$pelicula->ano.'</td>' .
                    '<td>'.$pelicula->vista.'</td>' .
                    '<td>'. '<a href="index.php?accion=update&'.$pelicula->codigo.'">Ver</a>' .'</td>' .
            '</tr>';
    }
    ?>
</table>
<br><br>
<a href="index.php?accion=delete">Borrar</a>

<?php include_once("partitials/footer.php") ?>
