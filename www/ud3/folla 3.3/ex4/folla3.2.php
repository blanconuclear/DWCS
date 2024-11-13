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
			/* width:200px; */
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
	<title></title>
</head>

<body>
	<article id="contenedor">
		<?php

		$servidor = "dbXdebug";
		$usuario = "root";
		$passwd = "root";
		$base = "musica";

		// CONECTAMOS
		$conexion = new mysqli($servidor, $usuario, $passwd, $base);
		if ($conexion->connect_error) {
			die("No es posible conectar a la base de datos: " . $conexion->connect_error);
		}
		$conexion->set_charset("utf8");

		$sentenciaDatos = $conexion->prepare("SELECT * FROM tema");
		$sentenciaDatos->execute();
		$resultado = $sentenciaDatos->get_result();

		while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
			print_r($fila);
		}

		?>

		<article>
</body>

</html>