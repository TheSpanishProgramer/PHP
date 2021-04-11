<?php
session_start();
require "../vendor/autoload.php";

use Clases\Usuarios;

function mostrarError($t)
{
    $_SESSION['error'] = $t;
    global $usu;
    $usu = null;
    header("Location:{$_SERVER['PHP_SELF']}");
    die();
}
if (isset($_POST['login'])) {
    $nombre = trim(strtolower($_POST['nombre']));
    $pass = trim($_POST['pass']);
    if (strlen($nombre) == 0 || strlen($pass) == 0) {
        mostrarError("Rellene los campos");
    }
    $usu = new Usuarios();
    $usu->setNombre($nombre);
    $usu->setPass(hash("sha256", $pass));
    $perfil = $usu->isOk();

    if ($perfil == -1) {
        if (isset($_COOKIE["errorV"])) {
            $cont = $_COOKIE["errorV"] + 1;
            if ($cont == 3) {
                setcookie("errorV", $cont, time() + 30); //30s
            } else {
                setcookie("errorV", $cont, time() + 3600); //1 h
            }
        } else {
            setcookie("errorV", 1, time() + 3600); //1 h
        }
        mostrarError("Error de Validación");
    } else {
        setcookie("errorV", "", time() - 100);
        $_SESSION['nombre'] = $nombre;
        $_SESSION['perfil'] = $perfil;
        $usu = null;
        header("Location:index.php");
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet" />
        <title>Login</title>
    </head>

    <body style="background-color:lightblue">
        <h3 class="text-center mt-3">Bazar S.A.</h3>

        <div class="container mt-3 mb-4">
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p class='my-3 p-3 bg-dark text-danger font-weight-bold'>{$_SESSION['error']}, te quedan: " . (3 - $_COOKIE['errorV']) . " intentos.</p>";
                unset($_SESSION['error']);
            }
            ?>
            <div class="card text-white bg-secondary mb-3 m-auto mt-5" style="max-width: 48rem;">
                <div class="card-header text-center">Login</div>
                <div class="card-body">
                    <form name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="nu">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="nu" placeholder="Ingrese su nombre" name="nombre" required>

                        </div>
                        <div class="form-group">
                            <label for="np">Password</label>
                            <input type="password" class="form-control" id="np" placeholder="Password" name="pass" required>
                        </div>
                        <?php
                        if (isset($_COOKIE['errorV']) && $_COOKIE['errorV'] == 3) {
                            echo  "<button type='submit' class='btn btn-primary' name='login' disabled><i class='fas fa-sign-in-alt mr-2'></i>Login (Espera 30s.)</button>";
                        } else {
                            echo  "<button type='submit' class='btn btn-primary' name='login'><i class='fas fa-sign-in-alt mr-2'></i>Login</button>";
                        }
                        ?>
                         <a href='index.php' class='ml-2 btn btn-info'><i class='fas fa-users-slash mr-2'></i>Invitado</a>
                    </form>

                </div>
            </div>
        </div>
    </body>

    </html>
<?php } ?>