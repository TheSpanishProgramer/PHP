<!DOCTYPE html>
<html lang="es">
<?php
session_start();
require 'usuarios.php'; //include, include_once, require_once
function isValido($u, $p){
    global $usuarios;
    foreach($usuarios as $item){
        if($u==$item[0] && hash("sha256", $p)==$item[1]){
            return [1, $item[2]];
        }
    }
    return [0];
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>login</title>
</head>

<body style="background-color:cadetblue">

    <div class="container mt-5">
        <?php 
        if(isset($_POST['login'])){
            //Procesamos formulario
            $usuario=trim($_POST['usuario']);
            $pass=trim($_POST['pass']);
            $comprobar=isValido($usuario, $pass);
            if($comprobar[0]){
                    //validacion correcta me creo las variable de sesion (usu y perfil)
                    $_SESSION['usuario']=$usuario;
                    $_SESSION['perfil']=$comprobar[1];
                    header('Location:sitio.php');
            }
            else{
                //me he equivocado, montamos el error
                ///me creo una var de sesion con el mensaje de error
                $_SESSION['error']="Usuario o cotraseña incorrectos !!!";
                header("Location:{$_SERVER['PHP_SELF']}");

            }
        }
        else{
            //Pintamos el formulari0
            if(isset($_SESSION['error'])){
                echo "<p class='my-3 text-danger font-weight-bold bg-dark'>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            }
        
        ?>
        <div class="card text-white bg-secondary mb-3 mx-auto" style="max-width:619px;">
            <div class="card-header text-center font-weight-bold" style="font-size:x-large;">Login</div>
            <div class="card-body">
                <form name="f1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                       
                        <input type='text' class='form-control' placeholder='usuario' name='usuario' required />
                    </div>
                    <div class="input-group form-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type='password' class='form-control' placeholder='contraseña' name='pass' required />
                    </div>

                    <div class='row mt-3'>
                        <div class='col'>
                            <div class='form-group form-check text-nowrap'>

                                <input type='checkbox' name='recordar' value='si' class='form-check-input mr-3' id='ckr'>
                                <label id='ckr' class='form-check-label'>Recordar</label>

                                <a href='/pacofer71/cookies/form1.php?borrar=yes' class='btn btn-warning float-right ml-4'><i class="fas fa-trash-alt mr-2"></i>Borrar Cookies</a>
                                <button type='submit' class='btn btn-primary float-right' name='login'><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>