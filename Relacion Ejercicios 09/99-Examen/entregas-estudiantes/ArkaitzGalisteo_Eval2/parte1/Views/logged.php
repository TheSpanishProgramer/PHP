<?php
include("partitions/head.php");
include("references.php");
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

if (isset($_GET['codP']) && isset($_GET['nombreP']) && isset($_GET['apellidosP'])){
    $arrayNewP = array(
        'codigo' => $_GET['codP'],
        'nombre' => $_GET['nombreP'],
        'apellido' => $_GET['apellidosP'],
        'atendido' => 0
    );
    if (isset($_SESSION['pacientes'])){
        if ($_SESSION['pacientes'] == null){
            $arrayP = array();
            array_push($arrayP, $arrayNewP);
            $_SESSION['pacientes'] = $arrayP;
        }else{
            $arrayPacientes = $_SESSION['pacientes'];
            array_push($arrayPacientes, $arrayNewP);
            $_SESSION['pacientes'] = $arrayPacientes;

        }

    }else{
        $arrayP = array();
        array_push($arrayP, $arrayNewP);
        $_SESSION['pacientes'] = $arrayP;
    }
    header('Location: logged.php');
}
//Borrar la sesion donde se guardan los pacientes
if (isset($_GET['borrarP'])){
    unset($_SESSION['pacientes']);
    header('Location: logged.php');
}
if (isset($_GET['user']) && isset($_GET['password']) or isset($_SESSION['user'])){
    $logged = false;
    if (isset($_GET['user']) && isset($_GET['password'])){
        foreach ($usuarios as $key => $value){
            if ($value['user'] == $_GET['user'] && $value['password'] == $_GET['password']){
                $logged = true;
            }
            $_SESSION['user'] = $_GET['user'];
        }
    }else{
        if (isset($_SESSION['user'])){
            $logged = true;
        }
    }
    if ($logged == true){
        echo '<h3>Welcome '. $_SESSION['user'] . '</h3>';
        echo "<br>";
        echo '<p>Añadir nuevo paciente</p>';
        echo "<form action='logged.php' method='get'>";
        echo "<input type='text' name='codP' placeholder='código del paciente'><input type='text' name='nombreP' placeholder='nombre'><input type='text' name='apellidosP' placeholder='apellidos'>";
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";

        echo "<form action='logged.php' method='get'><input type='submit' name='borrarP' value='Borrar todos los pacientes'></form>";
    }else{
        header('Location: ../index.php');
    }
}else{
    header('Location: ../index.php');
}
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $arrayCambiar =$_SESSION['pacientes'];
    $arrayCambiar[$id]['atendido'] = 1;
    $_SESSION['pacientes'] = $arrayCambiar;
    header('Location: logged.php');
}


if (isset($_SESSION['pacientes'])){
    $arrayMostrar =$_SESSION['pacientes'];
    echo "<table>";
    foreach ($arrayMostrar as $key => $value){
        echo "<tr>";
        echo "<td>{$value['codigo']}</td>";
        echo "<td>{$value['nombre']}</td>";
        echo "<td>{$value['apellido']}</td>";
        echo "<td>{$value['atendido']}</td>";
        echo "<td><a href='logged.php?id={$key}'>Atender</a></td>";
        echo "<tr>";
    }
    echo "<table>";
}

?>


<?php
include("partitions/footer.php");
?>
