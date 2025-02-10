<?php
session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idComentario']) && isset($_POST['accion'])) {

    $idComentario = $_POST['idComentario'];
    $accion = $_POST['accion'];
    $fecha = date('Y-m-d H:i:s');

    if ($accion === 'Aprobar') {
        $sql = "UPDATE comentarios SET dataModeracion = :dataModeracion, moderado = 'si' WHERE id = :idComentario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':dataModeracion' => $fecha,
            ':idComentario' => $idComentario
        ]);
    } elseif ($accion === 'Rechazar') {
        $sql = "DELETE FROM comentarios WHERE id = :idComentario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':idComentario' => $idComentario
        ]);
    }


    header("Location: moderarComentario.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderar Comentarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h2 class="text-center">Comentarios pendientes de moderación</h2>

    <div class="container">
        <?php
        $stmt = $pdo->query("SELECT c.*, p.nome AS nomeProduto FROM comentarios c JOIN productos p ON c.idProduto = p.idProduto WHERE c.moderado = 'non'");
        $comentariosPendentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($comentariosPendentes)) {
            echo "<p class='text-center text-muted'>No hay comentarios pendientes de moderación.</p>";
        } else {
            foreach ($comentariosPendentes as $comentario) { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Producto: <?php echo htmlspecialchars($comentario['nomeProduto']); ?></h5>
                        <p class="card-text"><strong>Usuario:</strong> <?php echo htmlspecialchars($comentario['usuario']); ?></p>
                        <p class="card-text"><strong>Comentario:</strong> <?php echo htmlspecialchars($comentario['Comentario']); ?></p>
                        <form action="moderarComentario.php" method="post">
                            <input type="hidden" name="idComentario" value="<?php echo $comentario['id']; ?>">
                            <button type="submit" name="accion" value="Aprobar" class="btn btn-success btn-sm">Aprobar</button>
                            <button type="submit" name="accion" value="Rechazar" class="btn btn-danger btn-sm">Rechazar</button>
                        </form>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

    <div class="text-center mt-3">
        <a href="mostra.php" class="btn btn-warning">Mostrar produtos</a>
        <a href="pechaSesion.php" class="btn btn-secondary">Cerrar Sesión</a>
    </div>

</body>

</html>