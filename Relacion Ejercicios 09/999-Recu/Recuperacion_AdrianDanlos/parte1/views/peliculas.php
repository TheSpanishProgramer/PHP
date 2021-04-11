<h1>Lista de películas</h1>
<p>Usuario conectado: <?=$_SESSION['usuario']?></p>

<h1>Añadir nueva</h1>
<p>Descripción</p>
<form action="index.php" method="GET">
    <input type="text" name="codigo" placeholder="codigo">
    <input type="text" name="titulo" placeholder="titulo">
    <input type="text" name="categoria" placeholder="categoria">
    <input type="text" name="year" placeholder="year">
    <input type="hidden" name="action" value="insertar">
    <button>Añadir</button>
</form>

<h1>Listado de películas</h1>
<table>
    <tr>
        <th>Código</th>
        <th>Título</th>
        <th>Categoría</th>
        <th>Año</th>
        <th>¿Vista?</th>
        <th>Ver</th>
    </tr>
    <!--creacion de la tabla dinamicamente-->
    <?php foreach ($_SESSION['peliculas'] as $pelicula){ ?>
        <tr>
            <td><?= $pelicula['codigo'] ?></td>
            <td><?= $pelicula['titulo'] ?></td>
            <td><?= $pelicula['categoria'] ?></td>
            <td><?= $pelicula['year'] ?></td>
            <td><?= $pelicula['vista'] ?></td>
            <td><a href="index.php?action=modificar&codigo=<?=$pelicula['codigo']?>">Marcar vista</a></td>
        </tr>
    <?php } ?>
</table>
<a href="index.php?action=borrar">Borrar todas las peliculas</a>