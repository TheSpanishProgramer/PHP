<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <p>1.Crea listado sobre la tabla Clientes que permita ALTA, BAJA y MODIFICACION, mediante el DNI.</p>
    <h2>
    Base de datos <u>banco</u><br>
    Tabla <u>cliente</u><br>
    </h2>
    <?php

      // Conexion
      $conexion = mysql_connect("localhost", "root", "root");
      mysql_select_db("banco", $conexion);
      mysql_set_charset('utf8');
      
      // ALTA
      if (isset($_POST['alta'])){
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
       
        $altaCliente = "INSERT INTO `cliente` (`dni`, `nombre`, `direccion`, `telefono`) "
                . "VALUES ('".$dni."','".$nombre."','".$direccion."','".$telefono."');";
        $consulta = mysql_query($altaCliente, $conexion);
        echo "Cliente <b>".$nombre."</b> añadido con éxito."; 
      }
      // BAJA
      if (isset($_POST['baja'])){
        $dni = $_POST['dni'];
        
        // Comprueba si ya existe un cliente con el DNI introducido
         $consultaE = "SELECT COUNT(*) FROM `cliente`  WHERE `dni` = '".$dni."';";
         $consultaExistencia = mysql_query($consultaE, $conexion);
        if ($consultaExistencia != 0){
       
        $bajaCliente = "DELETE FROM `cliente`  WHERE `dni` = '".$dni."';";
        $consulta = mysql_query($bajaCliente, $conexion);
        echo "Cliente con dni: <b>".$dni."</b> eliminado con éxito.";   
      }else{echo "No existe ningún cliente con ese dni";
      echo $consultaE;
      }
      }
      
      // MODIFICACION
      if (isset($_POST['aceptarCambios'])){
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
       
        $modificacionCliente = "UPDATE `cliente` SET "
                . "`dni` = '".$dni."', "
                . "`nombre` = '".$nombre."', "
                . "`direccion` = '".$direccion."', "
                . "`telefono` = '".$telefono."' "
                . "WHERE `dni` = '".$dni."'; ";
        $consulta = mysql_query($modificacionCliente, $conexion);
        echo "Cliente <b>".$nombre."</b> modificado con éxito."; 
      }

      // Consulta
      $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);

      //Listado
      ?>
      <table border="1">
        <tr>
        <td><b>DNI</b></td>
        <td><b>Nombre</b></td>
        <td><b>Dirección</b></td>
        <td><b>Teléfono</b></td>
        </tr>
        <form method="post" action="#">
          <tr>
            <td><input type="text" name="dni"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="text" name="telefono"></td>            
            <td><input type="submit" name="alta" value="ALTA"></td>            
          </tr>
        </form>
      <?php

      // fetch_array va sacando mientras hayan registros, los guarda en $registro, lo muestra, y cambia a otro registro.
        while ($registro = mysql_fetch_array($consulta)){
          echo "<tr>";
          echo "<td>".$registro[dni]."</td>";
          echo "<td>".$registro[nombre]."</td>";
          echo "<td>".$registro[direccion]."</td>";
          echo "<td>".$registro[telefono]."</td>";
          ?>
          <form action="editar.php" method="post">
            <input type="hidden" name="dni" value="<?= $registro[dni] ?>">
            <input type="hidden" name="nombre" value="<?= $registro[nombre] ?>">
            <input type="hidden" name="direccion" value="<?= $registro[direccion] ?>">
            <input type="hidden" name="telefono" value="<?= $registro[telefono] ?>">
            <td><button name="aModificar" value="aModificar">MODIFICAR</button></td>
          </form>
          </tr>
          <?php
        }
        
        
        
      ?>
      </table>
    <table>
      <form action="#" method="post">
          <tr>
            <td><input type="text" name="dni" placeholder="DNI CLIENTE"></td>
            <td><button name="baja" value="baja">BAJA</button></td>
      </form>
        
        
      </table>
    </body>
</html>