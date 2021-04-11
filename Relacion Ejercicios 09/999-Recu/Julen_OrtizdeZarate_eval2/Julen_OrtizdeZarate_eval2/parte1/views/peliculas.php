<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista peliculas</title>
</head>
<body>
<?= "estas conectado como " . $_SESSION["usuario"]?>
<h1>Lista peliculas</h1>
<form action="" method="get">
    <input type="text" name="codigo">
    <input type="text" name="titulo">
    <input type="text" name="categoria">
    <input type="text" name="ano">
    <input type="hidden" name="accion" value="nueva">
    <input type="submit" name="enviar" value="anadir">
</form>
<table>
    <thead>
        <tr>
            <td>Codigo</td>
            <td>Titulo</td>
            <td>Categoria</td>
            <td>Año</td>
            <td>¿Vista?</td>
            <td>ver</td>
        </tr>
    </thead>
    <tbody>
    <?php
    if(!isset($_SESSION["peliculas"])){
        $_SESSION["peliculas"] = array();
    }

    if(isset($_GET["accion"])){
        $accion=$_GET["accion"];
    }

    switch ($accion){
        case "nueva":
            if(isset($_GET["codigo"],$_GET["titulo"],$_GET["categoria"],$_GET["ano"]))
            anadirpelicula($_GET["codigo"],$_GET["titulo"],$_GET["categoria"],$_GET["ano"]);
            break;
        case "borrar":
            borrarpeliculas();
            break;
        case "vista":
            if(isset($_GET["codigo"])){
                marcarvista($_GET["codigo"]);
            }
    }

    function marcarvista($codigo){
        $cont=0;
            foreach ($_SESSION["peliculas"] as $pelicula){
                if($pelicula["codigo"]==$codigo){
                    $_SESSION["peliculas"][$cont]["vista"] = "1";
                }
                $cont++;
            }


    }


    function borrarpeliculas(){
        $_SESSION["peliculas"] = array();
    }
    function anadirpelicula($codigo,$titulo,$categoria,$ano){
        array_push($_SESSION["peliculas"], array(
            "codigo" => $codigo,
            "titulo" => $titulo,
            "categoria" => $categoria,
            "ano" => $ano,
            "vista" => "0"
        ));
    }

        foreach ($_SESSION["peliculas"] as $pelicula){
            echo "<tr>
                    <td>{$pelicula["codigo"]}</td>
                    <td>{$pelicula["titulo"]}</td>
                    <td>{$pelicula["categoria"]}</td>
                    <td>{$pelicula["ano"]}</td>
                    <td>{$pelicula["vista"]}</td>
                    <td><a href='index.php?accion=vista&codigo={$pelicula["codigo"]}'>Marcar vista</a></td>
                </tr>     
            ";
        }


    ?>
    </tbody>
</table>
<a href="index.php?accion=borrar">Borrar todas las peliculas</a>
</body>
</html>