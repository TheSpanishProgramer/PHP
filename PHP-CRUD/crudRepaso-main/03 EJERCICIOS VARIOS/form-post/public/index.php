<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-responsive.min.css">        
        <title>Bienvenid@ a PHP guay, curso de programación</title>
    </head>
    <body>
        <div class="container-fluid">
            <h2>PHP guay</h2>
            <form role="form">
              <div class="form-group">
                <label>E-mail:</label>
                <input type="email" class="form-control" name="email" placeholder="Escribe tu email...">
              </div>
              <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña...">
              </div>
              <button type="submit" class="btn btn-default">Entrar</button>
            </form>
            <?php 
            if($_GET)
            { ?>
                <h4>✔ Datos recibidos</h4>
                <?php 
                print_r($_GET);
            }
            ?>
        </div>
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>