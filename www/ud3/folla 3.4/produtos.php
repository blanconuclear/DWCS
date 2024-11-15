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


while ($fila = $resultado->fetch_assoc()) {
    $id = $fila['id'];
    $nombre = $fila['nombre'];
    $nombreCorto = $fila['nombre_corto'];
    $descripcion = $fila['descripcion'];
    $pvp = $fila['pvp'];
    $familia = $fila['familia'];

    echo "Nome: $nombre, Familia: $familia<br>";

    print_r($fila);
    echo "<br>";
}


// Pechar a conexión
$consulta->close();
$conexion->close();
