<?php
//Cargamos la conexión.
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hola</h1>

    <form action="produtos.php" method="get">
        <select name='familias'>";
            <option value="" selected>Selecciona unha opción</option>

            <?php
            //Listar todo
            $sentenciaDatos = $conexion->prepare("SELECT * FROM familias");
            $sentenciaDatos->execute();
            $resultado = $sentenciaDatos->get_result();

            while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
                //  print_r($fila);
                $nombre = $fila['nombre'];
                $cod = $fila['cod'];

                echo "<option value='$cod'>$nombre</option>";
            }
            ?>
            <option value="todos">Todos</option>
        </select>
        <label for="buscarProducto">Buscar Produto: </label>
        <input type="text" name="buscarProduto">

        <button name="btnConsulta">Consultar</button>
    </form>

    <form action="edicion.php" method="GET">
        <button name="btnEdicion">Editar</button>
    </form>
</body>

</html>