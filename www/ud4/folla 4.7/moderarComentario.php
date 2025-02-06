<?php
session_start();
require_once 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idComentario']) && isset($_POST['accion'])) {
    $idComentario = $_POST['idComentario'];
    $accion = $_POST['accion'];
    $fecha = date('Y-m-d H:i:s');

    // Determinar si se aprueba o rechaza el comentario
    $moderado = ($accion === 'Aprobar') ? 'si' : 'non';


    $sql = "UPDATE comentarios SET dataModeracion = :dataModeracion, moderado = :moderado WHERE id = :idComentario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':dataModeracion' => $fecha,
        ':moderado' => $moderado,
        ':idComentario' => $idComentario
    ]);

    header("Location: mostra.php");
    exit();
}

echo "<h2>Comentarios pendentes de moderación</h2>";
$stmt = $pdo->query("SELECT c.*, p.nome AS nomeProduto FROM comentarios c JOIN productos p ON c.idProduto = p.idProduto WHERE c.moderado = 'non'");
$comentariosPendentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($comentariosPendentes as $comentario) {
    echo "<p><strong>Producto:</strong> " . htmlspecialchars($comentario['nomeProduto']) . "</p>";
    echo "<p><strong>Usuario:</strong> " . htmlspecialchars($comentario['usuario']) . "</p>";
    echo "<p><strong>Comentario:</strong> " . htmlspecialchars($comentario['Comentario']) . "</p>";
    echo "<form action='moderarComentario.php' method='post'>";
    echo "<input type='hidden' name='idComentario' value='" . $comentario['id'] . "'>";
    echo "<input type='submit' name='accion' value='Aprobar'>";
    echo "<input type='submit' name='accion' value='Rechazar'>";
    echo "</form>";
}


echo " <a href='mostra.php'>Xestionar Comentarios</a>";
echo "<br>";
echo "<a href='pechaSesion.php'>Pechar Sesión</a>";
