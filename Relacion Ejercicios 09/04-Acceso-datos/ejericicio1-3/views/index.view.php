<?php require('partials/head.php') ?>

    <ul>
        <?php
        /*foreach ($items as $item) {
            echo "<li>{$item->texto} (<a href='index.php?accion=eliminar&id={$item->id}'>Eliminar</a>)</li>";
        }*/
        ?>

        <?php foreach ($items as $item) : ?>
            <li>
                <?= $item->texto ?> (<a href='index.php?accion=eliminar&id=<?=$item->id?>'>Eliminar</a>)
            </li>
        <?php endforeach; ?>

    </ul>
<br>
<h5>Añadir elemento</h5>
<form action="index.php" method="get">
    <input type="text" name="texto">
    <input type="hidden" name="accion" value="insertar">
    <input type="submit" value="Añadir">
</form>
<br>
<a href="index.php?accion=vaciar">Vaciar lista</a>

<?php require('partials/footer.php') ?>