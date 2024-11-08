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
			height: 300px;
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

		form {
			height: 300px;
		}
	</style>

	<meta charset="utf-8" />
	<title>Música</title>
</head>

<body>

	<article id="contenedor">
		<form action="" method="GET" class="tema">
			<button name="listar_todos" type="submit">Lista todos os temas</button>
			<button name="ordenar_titulo" type="submit">Listar ordenados polo título</button>
			<button name="ordenar_autor" type="submit">Lista ordenados polo autor</button>

			<label for="autor">Selecciona un autor:</label>
			<select name="autor" id="autor">
				<option value="Bob Dylan">Bob Dylan</option>
				<option value="Bruce Springsteen">Bruce Springsteen</option>
				<option value="Eagles">Eagles</option>
				<option value="John Lennon">John Lennon</option>
				<option value="Led Zeppelin">Led Zeppelin</option>
				<option value="Pink Floyd">Pink Floyd</option>
				<option value="The Beach Boys">The Beach Boys</option>
				<option value="The Beatles">The Beatles</option>
				<option value="The Doors">The Doors</option>
				<option value="The Rolling Stones">The Rolling Stones</option>
			</select>

			<button name="filtrar_autor" type="submit">Lista por autor seleccionado</button>

			<button name="engadir_rexistro" type="submit">Engadir Rexistro</button>

		</form>

		<?php
		// Conectar a la base de datos
		$conexion = mysqli_connect("dbXdebug", "root", "root", "musica");

		if (!$conexion) {
			die("Error de conexión: " . mysqli_connect_error());
		}

		// Consulta para obtener todos los temas
		$sql = "SELECT * FROM tema";

		if (isset($_GET['listar_todos'])) {
			$sql = "SELECT * FROM tema";
		} elseif (isset($_GET['ordenar_titulo'])) {
			$sql = "SELECT * FROM tema ORDER BY titulo ASC";
		} elseif (isset($_GET['ordenar_autor'])) {
			$sql = "SELECT * FROM tema ORDER BY autor ASC";
		}

		if (isset($_GET['filtrar_autor'])) {
			$autor = $_GET['autor'];
			$sql = "SELECT * FROM tema WHERE autor = '$autor' ";
		}

		// Eliminar registro
		if (isset($_POST['eliminar_rexistro'])) {
			$titulo = $_POST['eliminar_rexistro'];
			$sql_eliminar = "DELETE FROM tema WHERE Titulo = '$titulo'";
			mysqli_query($conexion, $sql_eliminar);
		}

		// Mostrar formulario para editar título y autor
		if (isset($_POST['editar_rexistro'])) {
			$titulo_actual = $_POST['editar_rexistro'];
			echo "
        <form method='post' action=''>
            <input type='hidden' name='titulo_actual' value='$titulo_actual'>

            <label for='nuevo_titulo'>Nuevo Título:</label>
            <input type='text' id='nuevo_titulo' name='nuevo_titulo' required>

            <label for='nuevo_autor'>Nuevo Autor:</label>
            <input type='text' id='nuevo_autor' name='nuevo_autor' required>

			<label for='nuevo_año'>Nuevo Año:</label>
            <input type='text' id='nuevo_año' name='nuevo_año' required>

			<label for='nuevo_tiempo'>Nuevo Tiempo:</label>
            <input type='text' id='nuevo_tiempo' name='nuevo_tiempo' required>

			<label for='nuevo_img'>Nueva Img:</label>
            <input type='file' id='nuevo_img' name='nuevo_img' required>

            <button type='submit' name='guardar_cambio'>Guardar Cambios</button>
        </form>
    ";
		}

		// Procesar la actualización del título, autor, año, segundos,img
		if (isset($_POST['guardar_cambio'])) {
			$titulo_actual = $_POST['titulo_actual'];
			$nuevo_titulo = $_POST['nuevo_titulo'];
			$nuevo_autor = $_POST['nuevo_autor'];
			$nuevo_año = $_POST['nuevo_año'];
			$nuevo_tiempo = $_POST['nuevo_tiempo'];
			$nuevo_img = $_POST['nuevo_img'];

			// Consulta SQL para actualizar el título, autor, año, segundos,img
			$sql_editar = "UPDATE tema SET Titulo = 
						  '$nuevo_titulo', 
						  Autor = '$nuevo_autor',
						  Ano = '$nuevo_año',
						  Duracion = '$nuevo_tiempo',
						  Imaxe = '$nuevo_img' 
						  WHERE Titulo = '$titulo_actual'";

			mysqli_query($conexion, $sql_editar);
		}

		// Mostrar formulario para agregar un nuevo registro
		if (isset($_GET['engadir_rexistro'])) {
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
			$sql_insertar = "INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) 
						     VALUES ('$nuevo_registro_titulo', 
									 '$nuevo_registro_autor', 
									 '$nuevo_registro_anho', 
									 '$nuevo_registro_tiempo', 
							 		 'Satisfaction')";

			mysqli_query($conexion, $sql_insertar);
		}

		$resultado = mysqli_query($conexion, $sql);

		// Iterar sobre los resultados y generar el HTML para cada tema
		while ($fila = mysqli_fetch_array($resultado)) {
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

			echo "<form action='' method='POST' style='display:inline;'>";
			echo "<button type='submit' name='eliminar_rexistro' value='$titulo'>Eliminar Rexistro</button>";
			echo "<button type='submit' name='editar_rexistro' value='$titulo'>Editar Rexistro</button>";
			echo "</form>";
			echo "</div>";
		}

		// Cerrar conexión
		mysqli_close($conexion);
		?>
	</article>
</body>

</html>