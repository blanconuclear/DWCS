<?php
session_start();
require_once 'conexion.php';

$idioma = $_COOKIE['idioma'];

$mensajes = [
    'es' => '¡Bienvenido!',
    'en' => 'Welcome!',
    'gl' => 'Benvido!',
];

echo "<h1>" . $mensajes[$idioma]  . "</h1>";

// Mostrar productos
$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($productos as $producto) {
    echo "<h2>" . $producto['nome'] . "</h2>";
    echo "<p>" . $producto['descricion'] . "</p>";
    echo "<img src='img/" . $producto['imaxe'] . "' alt='" . $producto['nome'] . "'><br>";

    $stmt = $pdo->prepare("SELECT * FROM comentarios WHERE idProduto = :idProducto AND moderado = 'si'");
    $stmt->execute([
        ':idProducto' => $producto['idProduto']
    ]);
    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Comentarios</h3>";
    foreach ($comentarios as $comentario) {
        echo "<p>" . $comentario['Comentario'] . "</p>";
    }

    if ($_SESSION['usuario']['rol'] == 'usuario') {

        echo "<form action='engadirComentario.php' method='post'>";
        echo "<input type='hidden' name='idProduto' value='" . $producto['idProduto'] . "'>";
        echo "<textarea name='comentario' required></textarea><br>";
        echo "<input type='submit' value='Engadir Comentario'>";
        echo "</form>";
    }
}

if ($_SESSION['usuario']['rol'] == 'moderador' || $_SESSION['usuario']['rol'] == "administrador") {
    echo "<h2>Comentarios pendentes de moderación</h2>";
    $stmt = $pdo->query("SELECT * FROM comentarios WHERE moderado = 'non'");
    $comentariosPendentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comentariosPendentes as $comentario) {
        echo "<p>" . $comentario['Comentario'] . "</p>";
        echo "<form action='moderarComentario.php' method='post'>";
        echo "<input type='hidden' name='idComentario' value='" . $comentario['id'] . "'>";
        echo "<input type='submit' name='accion' value='Aprobar'>";
        echo "<input type='submit' name='accion' value='Rechazar'>";
        echo "</form>";
    }

    echo " <a href='xestionaComentarios.php'>Xestionar Comentarios</a>
    <a href='xestionaProdutos.php'>Xestionar Produtos</a>";
}

echo "<br>";
echo "<a href='pechaSesion.php'>Pechar Sesión</a>";
