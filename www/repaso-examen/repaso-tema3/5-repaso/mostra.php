<?php
include_once 'conexion.php';

//Eliminar
if (isset($_POST['btn_eliminar'])) {
	$borrarNome = $_POST['btn_eliminar'];

	$sql = "DELETE FROM material WHERE Nome = :nome";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':nome' => $borrarNome]);
}

//Editar
if (isset($_POST['btn_editar'])) {
	$editarNome = $_POST['btn_editar'];

	echo "<form method='post'>
	<label for='editar_nome'>Nome:</label>
	<input type='text' name='editar_nome' />
	<label for='editar_marca'>Marca:</label>
	<input type='text' name='editar_marca' />
	<label for='editar_tipo'>Tipo:</label>
	<input type='text' name='editar_tipo' />
	<label for='editar_prezo'>Prezo:</label>
	<input type='text' name='editar_prezo' />
	<label for='editar_imaxe'>Imaxe:</label>
	<input type='text' name='editar_imaxe' />

	<button name='btn_enviar_editar' value='$editarNome'>Enviar</button>
  </form>";
}

if (isset($_POST['btn_enviar_editar'])) {
	$nomeBtn = $_POST['btn_enviar_editar'];

	$editar_nome = $_POST['editar_nome'];
	$editar_marca = $_POST['editar_marca'];
	$editar_tipo = $_POST['editar_tipo'];
	$editar_prezo = (int) $_POST['editar_prezo'];
	$editar_imaxe = $_POST['editar_imaxe'] . ".jpg";

	$sql = "UPDATE material SET Nome = :nome,
                                Marca= :marca,
                                Tipo =:tipo,
                                Prezo=:prezo,
                                Imaxe=:imaxe
                            WHERE Nome LIKE :nomeEditar";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		':nome' => "$editar_nome",
		':marca' => "$editar_marca",
		':tipo' => "$editar_tipo",
		':prezo' => "$editar_prezo",
		':imaxe' => "$editar_imaxe",
		':nomeEditar' => "%$nomeBtn%"
	]);
}

// Lista todos os produtos
if (isset($_GET['listar_todo'])) {
	$sql = "SELECT * FROM material";
	$stmt = $pdo->query($sql);
}

// Listar ordenados pola marca
if (isset($_GET['ordenar_marca'])) {
	$sql = "SELECT * FROM material ORDER BY Marca";
	$stmt = $pdo->query($sql);
}

// Lista Ordenados polo prezo
if (isset($_GET['ordenar_prezo'])) {
	$sql = "SELECT * FROM material ORDER BY Prezo";
	$stmt = $pdo->query($sql);
}

// Buscar por unha marca
if (isset($_GET['btn_buscar_marca'])) {
	$buscarMarca = $_GET['buscar_marca'];

	if (!empty($buscarMarca)) {
		$sql = "SELECT * FROM material WHERE Marca LIKE :marca";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':marca' => "%$buscarMarca%"]);
	} else {
		echo "introduce marca";
		return;
	}
}

// Buscar por calquera campo da base de datos
if (isset($_GET['btn_buscar_calquer_campo'])) {
	$buscarCalquerCampo = $_GET['buscar_calquer_campo'];

	if (!empty($buscarCalquerCampo)) {
		$sql = "SELECT * FROM material WHERE Nome LIKE :nome OR Marca LIKE :marca OR Tipo LIKE :tipo OR Prezo LIKE :prezo OR Imaxe LIKE :imaxe";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			':nome' => "%$buscarCalquerCampo%",
			':marca' => "%$buscarCalquerCampo%",
			':tipo' => "%$buscarCalquerCampo%",
			':prezo' => "%$buscarCalquerCampo%",
			':imaxe' => "%$buscarCalquerCampo%"
		]);
	}
}

// Lista polo tipo de produto
if (isset($_GET['btn_selectTipo'])) {
	$selectTipo = $_GET['selectTipo'];

	if (!empty($selectTipo)) {
		$sql = "SELECT * FROM material WHERE Tipo LIKE :tipo";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':tipo' => "%$selectTipo%"]);
	}
}
?>

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

		.produto {
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
	<title></title>
</head>

<body>
	<article id="contenedor">
		<?php
		//if (!empty($stmt)) {

		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$nome = $fila['Nome'];
			$marca = $fila['Marca'];
			$tipo = $fila['Tipo'];
			$prezo = $fila['Prezo'];
			$imaxe = $fila['Imaxe'];

			echo "<div class='produto'>
				<img src='imaxes/$imaxe'>
				<div>$nome</div>
				<div>$marca</div>
				<div>$tipo</div>
				<div>$prezo</div>
				<form method='post'>
                <button value='$nome' name='btn_eliminar'>Eliminar</button>
                <button value='$nome' name='btn_editar'>Editar</button>
            	</form>
				</div>";
		}
		//	}
		?>

	</article>

	<button><a href="intro.php">Volver</a></button>

</body>

</html>