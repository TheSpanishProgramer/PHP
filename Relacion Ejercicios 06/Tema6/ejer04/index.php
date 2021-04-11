
<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <p><b>4. Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos.<br>

<?php
include('../funciones.php');

// Define cual es user y pass
$_SESSION['user'] = "julian";
$_SESSION['pass'] = "4080";

// Si la variable logueado no existe, se pone false.
if (!isset($_SESSION['logueado'])){
$_SESSION['logueado']= false;
}

// Si usuario NO esta logueado, mostrar inicio de sesion
if (!$_SESSION['logueado']){

/// INICIO DE SESION \\\
?>
<table border="1" style="border-collapse: collapse; background-color: grey;">
  <form action="index.php" method="get">
    <tr>
      <td>NOMBRE USUARIO</td>
      <td><input type="text" name="username"></td>
    </tr>  
    <tr>
      <td>PASSWORD</td>
      <td><input type="text" name="userpass"> </td>
    </tr>
    <tr>
      <td><input type="submit" name="ok" value="Iniciar sesion">
    </tr>
  </form>
</table>
<?php
  if (($_SESSION['user'] == $_GET['username']) && ($_SESSION['pass'] == $_GET['userpass'])){
    echo '<script language="javascript">alert("LOGIN CORRECTO");</script>'; 
    header('Refresh: 0; url=ejer04.php');
    $_SESSION['logueado']= true;
  }else if ((isset ($_GET['username'])) || (isset($_GET['userpass']))){
    echo "Datos incorrectos";
  }
  
// Si ya ha accedido con 
}else{
  echo "Bienvenido usuario, accediendo al ejercicio...";
  header('Refresh: 2; url=ejer04.php');
}
?>
  </body>
</html>
