<?php
// Ejecutamos la lógica de arranque de la app, o lógica de bootstrap
require '../vendors/AgendaPHPGuay/People.php';
use \AgendaPHPGuay\People;
// Obtenemos los datos de los contactos
$people = People::getInstance(__DIR__ . "/../data/people.csv")
    ->getCsv()
    ->people;
?>
<!DOCTYPE html>
<html lang="es">
    <?php include '../views/head.php'; ?>
    <body>
        <div class="container-narrow">
            <div class="masthead">
                <h3 class="muted">Agenda PHP guay</h3>
            </div>
            <div class="jumbotron">                
                <a class="btn btn-large btn-success" href="add.php">Añadir contacto</a>
                <?php
                if(empty($people))
                { ?>
                    <h4>La agenda de contactos está vacía</h4>
                <?php
                }
                else 
                { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($people as $person)
                            { ?>
                            <tr>
                                <td><?php echo $person['name']; ?></td>
                                <td><?php echo $person['surname']; ?></td>
                                <td><?php echo $person['email']; ?></td>
                                <td>
                                    <a href="/agenda/people/update.php?name=<?php echo urlencode($person['name']); ?>&surname=<?php echo urlencode($person['surname']); ?>&email=<?php echo urlencode($person['email']); ?>" class="btn">Editar</a>
                                    <a href="/agenda/people/delete.php?email=<?php echo urlencode($person['email']); ?>" class="btn">Borrar</a>
                                </td>       
                            </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                <?php
                } ?>
            </div>
            <hr>
            <?php include '../views/footer.php'; ?>
        </div> <!-- /container -->
        <script src="../assets/bootsrap/js/bootsrap.min.js"></script>
    </body>
</html>