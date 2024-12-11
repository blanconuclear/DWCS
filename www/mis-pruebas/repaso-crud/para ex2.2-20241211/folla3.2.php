<?php
include_once 'conexion.php';

//Eliminar rexistro
if (isset($_POST['btn_eliminar'])) {
	$tituloEliminar = urldecode($_POST['btn_eliminar']);

	$sql = "DELETE FROM tema WHERE Titulo = :titulo";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':titulo' => $tituloEliminar]);
}

//Editar form
if (isset($_POST['btn_editar'])) {
	$tituloEliminar = $_POST['btn_editar'];

	// Usar una consulta preparada para evitar inyecciones SQL
	$sql = "SELECT Titulo FROM tema WHERE Titulo = :tituloEliminar";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':tituloEliminar', $tituloEliminar, PDO::PARAM_STR);
	$stmt->execute();

	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$titulo = $fila['Titulo'];
		// Puedes descomentar otras columnas si las necesitas
		// $autor = $fila['Autor'];
		// $ano = $fila['Ano'];
		// $duracion = $fila['Duracion'];
		// $imaxe = $fila['Imaxe'] . ".jpg"; // Asumir que la imagen tiene extensión .jpg

		// Formulario para editar el título
		echo "<form action='' method='POST'>
                <label for='titulo_editar'>Titulo: </label>
                <input type='text' name='titulo_editar' value='$titulo'>
                <button name='btn_enviar_editar'>Enviar</button>
              </form>";
	}
}

// Verificar si se ha solicitado listar todos los temas
if (isset($_GET['listar_todo'])) {
	$sql = "SELECT * FROM tema";
	$stmt = $pdo->query($sql);
}

//Lista   por   autor   seleccionado. 
if (isset($_GET['btn_selectAutor'])) {
	$autorSelect = $_GET['selectAutor'];

	if (!empty($autorSelect)) {

		$sql = "SELECT * FROM tema WHERE Autor LIKE :autor";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':autor' => "%$autorSelect%"]);
	} else {
		echo "introduce unha marca correcta";
		echo "<a href='folla3.2.php'>Volver</a>";
		return;
	}
}

//Listar ordenados polo título
if (isset($_GET['listar_titulo'])) {
	$sql = "SELECT * FROM tema ORDER BY Titulo";
	$stmt = $pdo->query($sql);
}
//Listar ordenados polo autor
if (isset($_GET['listar_autor'])) {
	$sql = "SELECT * FROM tema ORDER BY Autor";
	$stmt = $pdo->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Lista de Temas</title>
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
</head>

<body>

	<form action="folla3.2.php" method="get">
		<button name="listar_todo">Lista todos os temas</button>
		<button name="listar_titulo">Listar ordenados polo título</button>
		<button name="listar_autor">Lista Ordenados polo autor</button>
		<select name="selectAutor">
			<option value="" selected>Selecciona autor</option>
			<?php
			// Obtener los autores disponibles
			$sql = "SELECT DISTINCT Autor FROM tema";
			$stmtAutores = $pdo->query($sql);
			while ($fila = $stmtAutores->fetch(PDO::FETCH_ASSOC)) {
				$autor = $fila['Autor'];
				echo "<option value='$autor'>$autor</option>";
			}
			?>
		</select>
		<button name="btn_selectAutor">Enviar autor</button>
	</form>

	<article id="contenedor">
		<?php
		// Solo mostrar los temas si 'listar_todo' está definido

		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$titulo = $fila['Titulo'];
			$autor = $fila['Autor'];
			$ano = $fila['Ano'];
			$duracion = $fila['Duracion'];
			$imaxe = $fila['Imaxe'] . ".jpg"; // Asumir que la imagen tiene extensión .jpg

			$tituloCodificado = urlencode($titulo);
			echo "<div class='tema'>
                    <img src='imaxes/$imaxe' alt='$titulo'>
                    <div>$titulo</div>
                    <div>$autor</div>
                    <div>$ano</div>
                    <div>$duracion</div>
					<form method='post'>
						<button name='btn_eliminar' value='$tituloCodificado'>Eliminar</button>
						<button name='btn_editar' value='$titulo'>Editar</button>
					</form>
                </div>";
		}

		?>
	</article>

</body>

</html>