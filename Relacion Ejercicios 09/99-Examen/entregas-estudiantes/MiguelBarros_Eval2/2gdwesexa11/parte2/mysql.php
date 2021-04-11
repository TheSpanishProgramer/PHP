<?php
    function connect() {
        $servername = "localhost";
        $dbname = "pacientes";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        return $conn;
    }

    function close ($dbh) {
         $dbh = null;
    }

    function comprobarLogin($dbh, $contrasena,$usuario) {
        $data = array(
            "usuario" => $usuario,
            "contrasena" => $contrasena
        );

        $stmt = $dbh -> prepare("SELECT * FROM usuarios WHERE usuario=:usuario AND contrasena=:contrasena");

        if ($stmt->execute($data) == true) {
            header("location: pacientes.php");
        } else {
            header("location: login.php");
        }
    }

    function mostrarPacientes($dbh) {
        $stmt = $dbh ->prepare("SELECT * FROM pacientes");
        if ($stmt->execute() == true) {
            return $stmt-> fetchAll(PDO::FETCH_OBJ);
        }
    }

    function anadirPaciente($dbh, $codigo, $nombre, $apellidos, $antendido) {

        $data = array(
            "codigo" => $codigo,
            "nombre" => $nombre,
            "apellidos" => $apellidos,
            "atendido" => $antendido
        );

        $stmt = $dbh ->prepare("INSERT INTO pacientes(codigo,nombre,apellidos,atendido) VALUES(:codigo,:nombre,:apellidos,:atendido)");

        if ($stmt->execute($data) == true) {
            return $stmt->rowCount();
        }
    }

    function borrarPacientes($dbh) {
        $stmt = $dbh->prepare("DELETE FROM pacientes");

        if ($stmt->execute() == true) {
            return $stmt->rowCount();
        }
    }

    function anadirAtendido($dbh,$codigo) {
        $data = array(
            "codigo" => $codigo
        );

        $stmt = $dbh->prepare("UPDATE pacientes SET atendido=1 WHERE codigo=:codigo");

        if ($stmt->execute($data) == true) {
            return $stmt->rowCount();
        }
    }
?>
