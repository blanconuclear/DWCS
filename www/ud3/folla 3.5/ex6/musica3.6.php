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
		//Conexión
		$servidor = "db";
		$usuario = "root";
		$passwd = "root";
		$base = "musica";

		try {
			$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
			echo "Conexión Ok!.<br>";
		} catch (Exception $e) {
			echo "Erro na conexión: " . $e->getMessage();
		}


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
			$stmt=$pdo->prepare("")
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
			$titulo_actual = urldecode($_POST['titulo_actual']);
			$nuevo_titulo = $_POST['nuevo_titulo'];
			$nuevo_autor = $_POST['nuevo_autor'];
			$nuevo_año = $_POST['nuevo_año'];
			$nuevo_tiempo = $_POST['nuevo_tiempo'];
			$nuevo_img = "Born to run";

			$stmt = $pdo->prepare("UPDATE tema SET Titulo = :nuevo_titulo, Autor = :autor, Ano = :ano, Duracion = :duracion, Imaxe = :imaxe 
								   WHERE Titulo = :titulo_actual");
			$stmt->bindParam(':nuevo_titulo', $nuevo_titulo);
			$stmt->bindParam(':titulo_actual', $titulo_actual);
			$stmt->bindParam(':autor', $nuevo_autor);
			$stmt->bindParam(':ano', $nuevo_año);
			$stmt->bindParam(':duracion', $nuevo_tiempo);
			$stmt->bindParam(':imaxe', $nuevo_img);

			$stmt->execute();
		}


		// Eliminar registro
		if (isset($_POST['eliminar_rexistro'])) {
			$titulo = urldecode($_POST['eliminar_rexistro']);

			$sql = "DELETE FROM tema WHERE titulo = :titulo";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':titulo' => $titulo]);
		}

		// Listar todos los temas si no se ha presionado ningún botón de ordenación
		if (isset($_POST['listar_todos'])) {
			$pdoStatement = $pdo->query("select * from tema");
			$pdoStatement->execute();
		}
		// Ordenar por autor alfabéticamente
		elseif (isset($_POST['ordenar_autor'])) {
			$pdoStatement = $pdo->query("SELECT * from tema ORDER BY autor");
			$pdoStatement->execute();
		}
		// Ordenar por título alfabéticamente
		elseif (isset($_POST['ordenar_titulo'])) {
			$pdoStatement = $pdo->query("SELECT * from tema ORDER BY titulo");
			$pdoStatement->execute();
		}
		// Si no se ha presionado ningún botón, listar todos los temas por defecto
		else {

			try {
				$pdoStatement = $pdo->query("select * from tema");
				$pdoStatement->execute();
			} catch (PDOException $e) {
				echo "erro na consulta!";
			}
		}




		// Mostrar los temas
		while ($fila = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
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
			echo "<button type='submit' name='editar_rexistro' value='" . urlencode($titulo) . "'>Editar Rexistro</button>";
			echo "</form>";
			echo "</div>";
		}

		?>
	</article>
</body>

</html>