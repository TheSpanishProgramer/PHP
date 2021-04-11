<?php
include("partitions/head.php");
include("references.php");
include("../DAO/userDAO.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['borrarP'])){
borrarPacientes();
}
if (isset($_GET['id'])){
    updatePaciente($_GET['id']);
}
if (isset($_GET['codP']) && isset($_GET['nombreP']) && isset($_GET['apellidosP'])){
    añadirPaciente($_GET['codP'], $_GET['nombreP'], $_GET['apellidosP']);
}
if (isset($_GET['user']) && isset($_GET['password'])){
    $check = checkLogin($_GET['user'], $_GET['password']);

    if ($check == false){
        header('Location: ../index.php');
    }
}
echo '<p>Añadir nuevo paciente</p>';
echo "<form action='logged.php' method='get'>";
echo "<input type='text' name='codP' placeholder='código del paciente'><input type='text' name='nombreP' placeholder='nombre'><input type='text' name='apellidosP' placeholder='apellidos'>";
echo "<input type='submit' value='Enviar'>";
echo "</form>";

echo "<form action='logged.php' method='get'><input type='submit' name='borrarP' value='borrar'></form>";

echo "<br>";

echo "<form action='logged.php' method='get'><table>";
    mostrarPacientes();
echo "</table></form>";
?>



<?php
include("partitions/footer.php");
?>
