<?php
require_once '../modelo/ProductoModelo.php';
require_once '../vista/vistaProducto.php';

if (isset($_GET['todos'])) {
    $productos = ProductoModelo::obtenerTodos(); // Obtener todos los productos
    $productosArray = []; // Inicializar array vacío

    while ($fila = $productos->fetch(PDO::FETCH_ASSOC)) {
        $productosArray[] = $fila; // Convertir resultados en array
    }

    mostraTaboaProductos($productosArray); // Pasar el array a la función
}


if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $precio = floatval($_POST['precio']);
    $stock = intval($_POST['stock']);

    $nuevoProducto = new ProductoModelo($nombre, $precio, $stock);
    $nuevoProducto->guardar();

    header('Location: ProductoControlador.php');
    exit();
}

if (isset($_POST['eliminar'])) {
    $id = intval($_POST['eliminar']);
    ProductoModelo::borrarPorId($id);

    header('Location: ProductoControlador.php');
    exit();
}
