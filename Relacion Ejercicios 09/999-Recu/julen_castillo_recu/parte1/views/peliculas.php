<?php include_once "partials/header.php"?>



<h1>LISTA DE PELICULAS</h1>
<p>Usuario conectado: <?php echo $_SESSION["usuario"]?></p>
<br>
<br>
<h2>Añadir nuevas peliculas</h2>
<form target="#" method="get">
    <input type="text" name="codigo" placeholder="codigo">
    <input type="text" name="titulo" placeholder="titulo">
    <input type="text" name="categoria" placeholder="categoria">
    <input type="text" name="año" placeholder="año">
    <input type="hidden" name="accion" value="nuevo">
    <input type="submit" value="Añadir">
</form>

<h1>LISTADO</h1>
<table>
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Año</th>
            <th>Vista?</th>
            <!--<th></th>-->
        </tr>
    </thead>
    <tbody>
    <?php foreach ($_SESSION["peliculas"] as $pelicula)
    {?>
    <tr>
        <td> <?= $pelicula["codigo"] ?></td>
        <td> <?= $pelicula["titulo"] ?></td>
        <td> <?= $pelicula["categoria"]?></td>
        <td> <?= $pelicula["año"]?></td>
        <td> <?= $pelicula["vista"] ?></td>
        <td> <a href="index.php?accion=marcar&codigo=<?php echo $pelicula["codigo"]?>">Marcar vista</a> </td>
    </tr>
    <?php   } ?>

    </tbody>


</table>

<a href="index.php?accion=borrar">Borrar</a>


<?php include_once "partials/footer.php"?>
