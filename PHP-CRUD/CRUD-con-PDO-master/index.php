<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>crud</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	//Requerimos la conexion a la bbdd
		require "conexion.php";
	// ------------------------------Paginación---------------------------------------------


		// almacenamos cuantos registros queremos mostrar por página
	$tamagno_paginas = 3;
	// la página en la que estamos al cargar la página (cuando carguemos la página quero que me muestre la pagina 1)
	$pagina = 1;
	
	if (isset($_GET['page'])) {
		$page_user = $_GET['page'];
		$empezar_desde = ($page_user-1)*$tamagno_paginas;
	}else{
		$empezar_desde = ($pagina-1)*$tamagno_paginas;
	}
	

	// Esta consulta la hacemos para saber cuantos registros hay en dicha consulta
	$sql_total = "SELECT * FROM datos_usuarios";
	$resultado = $pdo->prepare($sql_total);
	$resultado->execute(array());

	// almacenamos cuantas filas nos devuelve la consulta sql
	$num_filas = $resultado->rowCount();

	// paginas que tendremos, teniendo en cuenta los registros de cada pagina (tamagno_paginas)
	$total_paginas = ceil($num_filas/$tamagno_paginas);

	// --------------------------------------------------------------------------------------------

	//creamos un resource en $conexion con la consulta
		$conexion = $pdo->query("SELECT * FROM datos_usuarios LIMIT $empezar_desde,$tamagno_paginas");
	//almacenamos en $registro un array de objetos, y asi luego poder usar sus propiedades
		$registro = $conexion->fetchAll(PDO::FETCH_OBJ);
		
		echo "<br>";
	?>
	<table id="form">
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Dirección</td>
		</tr>

		<!-- recorremos el array de objetos -->
		
			<?php foreach($registro as $persona): ?>
		<tr>

		<!-- pintamos las propiedades de cada objeto en un td -->
				<td><?=$persona->id?></td>
				<td><?=$persona->nombre?></td>
				<td><?=$persona->apellido?></td>
				<td><?=$persona->direccion?></td>
				<td><a href="delete.php?id=<?=$persona->id ?>"><input type="button" name="del" value="borrar"></a></td>
				<td><a href="edit.php?id=<?=$persona->id ?>
					 & nom=<?=$persona->nombre ?>
					 & apell=<?=$persona->apellido ?>
					 & direc=<?=$persona->direccion ?>"><input type="button" name="act" value="actualizar"></a></td>
		</tr>
			<?php endforeach ?>
		<form action="insert.php" method="POST">
		<tr>
			<td></td>
			<td><input type="text" name="name"></td>
			<td><input type="text" name="surname"></td>
			<td><input type="text" name="address"></td>
			<td><input type="submit" name="enviar" value="Enviar"></td>
		</tr>
		</form>
	</table>
	<?php for ($i=$pagina; $i<=$total_paginas; $i++): ?>
	
		<a href="?page=<?=$i?>"><?=$i?></a>
	
	
	<?php endfor; ?>
</body>
</html>