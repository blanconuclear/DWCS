<!DOCTYPE html>
<html>

<head>
	<style>
		#contenedor {
			width: 70%;
			margin: 20px auto;
			background-color: white;
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			grid-gap: 5px;
		}

		.tema {
			height: auto;
			background-color: white;
			border: 1px black solid;
			text-align: center;
			padding-top: 20px;
			font-family: Arial;
		}

		img {
			width: 130px;
			height: 130px;
		}
	</style>

	<meta charset="utf-8" />
	<title>Lista de Temas</title>
</head>

<body>
	<article id="contenedor">
		<form action="" method="POST" class="tema">
			<button name="listar_todos" type="submit">Lista todos os temas</button>
			<button name="ordenar_titulo" type="submit">Listar ordenados polo título</button>
			<button name="ordenar_autor" type="submit">Lista ordenados polo autor</button>

			<button name="engadir_rexistro" type="submit">Engadir Rexistro</button>

		</form>

		<?php
		$servidor = "dbXdebug";
		$usuario = "root";
		$passwd = "root";
		$base = "musica";

		// Conexión a la base de datos
		$conexion = new mysqli($servidor, $usuario, $passwd, $base);
		if ($conexion->connect_error) {
			die("No es posible conectar a la base de datos: " . $conexion->connect_error);
		}
		$conexion->set_charset("utf8");

		// Mostrar formulario para agregar un nuevo registro
		if (isset($_POST['engadir_rexistro'])) {
			echo "
			<form method='post' action='' enctype='multipart/form-data'>
				<label for='nuevo_titulo'>Título:</label>
				<input type='text' id='nuevo_rexistro_titulo' name='nuevo_rexistro_titulo' required>
	
				<label for='nuevo_autor'>Autor:</label>
				<input type='text' id='nuevo_rexistro_autor' name='nuevo_rexistro_autor' required>
	
				<label for='nuevo_año'>Año:</label>
				<input type='number' id='nuevo_rexistro_año' name='nuevo_rexistro_año' required>
	
				<label for='nuevo_tiempo'>Tiempo:</label>
				<input type='text' id='nuevo_rexistro_tiempo' name='nuevo_rexistro_tiempo' required>
	
				<label for='nuevo_img'>Imagen:</label>
				<input type='file' id='nuevo_rexistro_img' name='nuevo_rexistro_img' >
	
				<button type='submit' name='guardar_nuevo_registro'>Guardar Nuevo</button>
			</form>
		";
		}

		// Procesar la creación del título, autor, año, segundos,img
		if (isset($_POST['guardar_nuevo_registro'])) {
			$nuevo_registro_titulo = $_POST['nuevo_rexistro_titulo'];
			$nuevo_registro_autor = $_POST['nuevo_rexistro_autor'];
			$nuevo_registro_anho = $_POST['nuevo_rexistro_año'];
			$nuevo_registro_tiempo = $_POST['nuevo_rexistro_tiempo'];

			// Consulta para insertar el nuevo registro
			$sentenciaCrear = $conexion->prepare("INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) 
								 VALUES (?,?,?,?,'img_prueba')");

			$sentenciaCrear->bind_param("ssss", $nuevo_registro_titulo, $nuevo_registro_autor, $nuevo_registro_anho, $nuevo_registro_tiempo);
			$sentenciaCrear->execute();
		}

		// Mostrar formulario para editar título y autor
		if (isset($_POST['editar_rexistro'])) {
			$titulo_actual = $_POST['editar_rexistro'];
			echo "
				<form method='post' action=''>
					<input type='hidden' name='titulo_actual' value='$titulo_actual'>
		
					<label for='nuevo_titulo'>Nuevo Título:</label>
					<input type='text' name='nuevo_titulo' required>
		
					<label for='nuevo_autor'>Nuevo Autor:</label>
					<input type='text' name='nuevo_autor' required>
		
					<label for='nuevo_año'>Nuevo Año:</label>
					<input type='text' name='nuevo_año' required>
		
					<label for='nuevo_tiempo'>Nuevo Tiempo:</label>
					<input type='text' name='nuevo_tiempo' required>
		
					<label for='nuevo_img'>Nueva Img:</label>
					<input type='file' name='nuevo_img'>
		
					<button type='submit' name='guardar_cambio'>Guardar Cambios</button>
				</form>
			";
		}

		// Procesar la actualización del título, autor, año, duración, imagen
		if (isset($_POST['guardar_cambio'])) {
			$titulo_actual = $_POST['titulo_actual'];
			$nuevo_titulo = $_POST['nuevo_titulo'];
			$nuevo_autor = $_POST['nuevo_autor'];
			$nuevo_año = $_POST['nuevo_año'];
			$nuevo_tiempo = $_POST['nuevo_tiempo'];
			$nuevo_img = $_POST['nuevo_img'];

			$sentenciaEditar = $conexion->prepare("UPDATE tema 
			SET Titulo = ?, Autor = ?, Ano = ?, Duracion = ?, Imaxe = ? 
			WHERE Titulo = ?");
			$sentenciaEditar->bind_param("ssssss", $nuevo_titulo, $nuevo_autor, $nuevo_año, $nuevo_tiempo, $nuevo_img, $titulo_actual);
			$sentenciaEditar->execute();
		}


		// Eliminar registro
		if (isset($_POST['eliminar_rexistro'])) {
			$titulo = urldecode($_POST['eliminar_rexistro']);

			$sentenciaEliminar = $conexion->prepare("DELETE FROM tema WHERE Titulo = ?");
			$sentenciaEliminar->bind_param("s", $titulo);
			$sentenciaEliminar->execute();
			$sentenciaEliminar->close();
		}

		// Listar todos los temas si no se ha presionado ningún botón de ordenación
		if (isset($_POST['listar_todos'])) {
			$sentenciaDatos = $conexion->prepare("SELECT * FROM tema");
			$sentenciaDatos->execute();
			$resultado = $sentenciaDatos->get_result();
		}
		// Ordenar por autor alfabéticamente
		elseif (isset($_POST['ordenar_autor'])) {
			$sentenciaDatos = $conexion->prepare("SELECT * FROM tema ORDER BY Autor ASC");
			$sentenciaDatos->execute();
			$resultado = $sentenciaDatos->get_result();
		}
		// Ordenar por título alfabéticamente
		elseif (isset($_POST['ordenar_titulo'])) {
			$sentenciaDatos = $conexion->prepare("SELECT * FROM tema ORDER BY Titulo ASC");
			$sentenciaDatos->execute();
			$resultado = $sentenciaDatos->get_result();
		}
		// Si no se ha presionado ningún botón, listar todos los temas por defecto
		else {
			$sentenciaDatos = $conexion->prepare("SELECT * FROM tema");
			$sentenciaDatos->execute();
			$resultado = $sentenciaDatos->get_result();
		}




		// Mostrar los temas
		while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
			$titulo = $fila['Titulo'];
			$autor = $fila['Autor'];
			$ano = $fila['Ano'];
			$duracion = $fila['Duracion'];
			$imagen = $fila['Imaxe'];

			echo "<div class='tema'>";
			echo "<img src='imaxes/$imagen.jpg' alt='$titulo'><br>";
			echo "<strong>$titulo</strong><br>";
			echo "Autor: $autor<br>";
			echo "Año: $ano<br>";
			echo "Duración: $duracion segundos<br>";

			// Botones de eliminar y editar
			echo "<form action='' method='POST' style='display:inline;'>";
			echo "<button type='submit' name='eliminar_rexistro' value='" . urlencode($titulo) . "'>Eliminar Rexistro</button>";
			echo "<button type='submit' name='editar_rexistro' value='$titulo'>Editar Rexistro</button>";
			echo "</form>";
			echo "</div>";
		}

		// Cerrar la conexión
		$conexion->close();
		?>
	</article>
</body>

</html>