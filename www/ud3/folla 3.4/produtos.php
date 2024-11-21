<?php
require_once 'conexion.php';

// Obter os parámetros da URL
$familia = $_GET['familias'] ?? '';
$buscarProduto = $_GET['buscarProduto'] ?? '';

if ($familia === 'todos') {
    // Mostrar todos os produtos
    $consulta    = $conexion->prepare("SELECT * FROM productos");
    $consulta->execute();
    $resultado = $consulta->get_result();
} elseif (!empty($buscarProduto)) {
    // Buscar produtos polo nome ou descrición
    $consulta = "SELECT * FROM productos WHERE nombre LIKE ? OR nombre_corto LIKE ? OR descripcion LIKE ?";
    $termoBusca = "%$buscarProduto%";
    $consulta = $conexion->prepare($consulta);
    $consulta->bind_param("sss", $termoBusca, $termoBusca, $termoBusca);
    $consulta->execute();
    $resultado = $consulta->get_result();
} elseif ($familia && $buscarProduto) {
    $consulta = "SELECT * FROM productos WHERE familia = ? AND (nombre LIKE ? OR nombre_corto LIKE ? OR descripcion LIKE ?)";
    $termoBusca = "%$buscarProduto%";
    $consulta = $conexion->prepare($consulta);
    $consulta->bind_param("sss", $termoBusca, $termoBusca, $termoBusca);
    $consulta->execute();
    $resultado = $consulta->get_result();
} else {
    // Filtrar por familia
    $consulta = "SELECT * FROM productos WHERE familia = ?";
    $consulta = $conexion->prepare($consulta);
    $consulta->bind_param("s", $familia);
    $consulta->execute();
    $resultado = $consulta->get_result();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Nombre_corto</th>
            <th>Descripción</th>
            <th>Pvp</th>
            <th>Familia</th>
            <th>Detalle</th>
        </tr>
        <?php
        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $nombreCorto = $fila['nombre_corto'];
            $descripcion = $fila['descripcion'];
            $pvp = $fila['pvp'];
            $familia = $fila['familia'];


            echo "<tr>";
            echo "<th>" . $id . "</th>";
            echo "<th>" . $nombre . "</th>";
            echo "<th>" . $nombreCorto . "</th>";
            echo "<th>" . substr($descripcion, 0, 100) . "..." . "</th>";
            echo "<th>" . $pvp . "</th>";
            echo "<th>" . $familia . "</th>";
            echo "<th>
            <form action='detalle.php' method='get'>
                <button type='submit' name='btn_detalle' value='$id'>Detalle</button>
            </form>
          </th>";
            echo "</tr>";
        }
        ?>
    </table>

    <button><a href="inicio.php">Inicio</a></button>
</body>

</html>

<?php
// Pechar a conexión
$consulta->close();
$conexion->close();

?>