<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <td>Codigo</td>
        <td>Titulo</td>
        <td>Categoria</td>
        <td>Año</td>
        <td>Vista</td>
        <td>Marcar vista</td>
    </tr>
    <?php foreach ($peliculas as $pelicula):?>
        <tr>
            <td><?=$pelicula['codigo']?></td>
            <td><?=$pelicula['titulo']?></td>
            <td><?=$pelicula['categoria']?></td>
            <td><?=$pelicula['ano']?></td>
            <td><?=$pelicula['vista']?></td>
            <td><a href="index.php?accion=update&id=<?=$pelicula['id']?>">Ver</a></td>
        </tr>
    <?php endforeach; ?>
</table>


<form action="index.php" method="get">
    <label>Codigo</label><input type="text" name="codi">
    <label>Titulo</label><input type="text" name="titu">
    <label>Categoria</label><input type="text" name="cate">
    <label>año</label><input type="text" name="ano">
    <input type="hidden" name="accion" value="insert">
    <input type="submit" name="Insert">
</form>
<a href="index.php?accion=delete">Borrar</a>
</body>
</html>