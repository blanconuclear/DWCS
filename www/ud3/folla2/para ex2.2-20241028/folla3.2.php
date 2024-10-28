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
			height: 210px;
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
			echo "Duración: $duracion segundos";
			echo "</div>";
		}

		// Cerrar conexión
		mysqli_close($conexion);
		?>
	</article>
</body>

</html>