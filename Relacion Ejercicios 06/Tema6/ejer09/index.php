<?php session_start() ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <p><b>9. Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar se almacenen
en cookies. La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de
productos..<br>

<?php
include('../funciones.php');

// Define cual es user y pass
$_SESSION['admin'] = "admin";
$_SESSION['adminpass'] = "1234";

$_SESSION['user'] = "julian";
$_SESSION['userpass'] = "4080";

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
      <td><input type="password" name="userpass"> </td>
    </tr>
    <tr>
      <td><input type="submit" name="ok" value="Iniciar sesion" autofocus>
    </tr>
  </form>
</table>
<?php
  if (($_SESSION['user'] == $_GET['username']) && ($_SESSION['userpass'] == $_GET['userpass'])){
    echo '<script language="javascript">alert("LOGIN CORRECTO");</script>'; 
    header('Location: tienda.php');
    $_SESSION['logueado']= true;
    $_SESSION['tipoAcceso']= "user";
  }
  if (($_SESSION['admin'] == $_GET['username']) && ($_SESSION['adminpass'] == $_GET['userpass'])){
    echo '<script language="javascript">alert("LOGIN CORRECTO");</script>'; 
    header('Location: tienda.php');
    $_SESSION['logueado']= true;
    $_SESSION['tipoAcceso']= "admin";
  }else if (isset ($_GET['username'])){
    echo "Datos incorrectos";
  }
  
// Si ya ha accedido
}else{
  echo "Bienvenido usuario, accediendo al ejercicio...";
  header('Refresh: 2; url=ejer04.php');
}
?>
  </body>
</html>
