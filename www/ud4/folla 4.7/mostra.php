<?php
session_start();
require_once 'conexion.php';

$idioma = $_COOKIE['idioma'] ?? 'es';

$mensajes = [
    'es' => 'Bienvenido',
    'en' => 'Welcome',
    'gl' => 'Benvido',
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h1 class="text-center">
        <?php echo $_SESSION['usuario']['nomeUsuario'] . " " . $mensajes[$idioma] . " !"; ?>
    </h1>

    <div class="container">
        <?php
        $stmt = $pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($productos as $producto) { ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/<?php echo $producto['imaxe']; ?>" class="img-fluid rounded-start">
                            </div>
                            <div class=" col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nome']; ?></h5>
                                    <p class="card-text"><?php echo $producto['descricion']; ?></p>

                                    <h6><b>Comentarios</b></h6>
                                    <?php
                                    $stmt = $pdo->prepare("SELECT * FROM comentarios WHERE idProduto = :idProducto AND moderado = 'si'");
                                    $stmt->execute([':idProducto' => $producto['idProduto']]);
                                    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($comentarios as $comentario) { ?>
                                        <p class="small"><?php echo $comentario['Comentario']; ?></p>
                                        <?php if ($_SESSION['usuario']['rol'] == 'moderador' || $_SESSION['usuario']['rol'] == 'administrador') { ?>
                                            <form method="post">
                                                <button class="btn btn-danger btn-sm" name="btnBorrar" value="<?php echo $comentario['id']; ?>">Borrar</button>
                                            </form>
                                        <?php }
                                    }

                                    if ($_SESSION['usuario']['rol'] == 'usuario') { ?>
                                        <form action="engadirComentario.php" method="post">
                                            <input type="hidden" name="idProduto" value="<?php echo $producto['idProduto']; ?>">
                                            <textarea class="form-control" name="comentario" required></textarea><br>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Añadir Comentario">
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php
    if (isset($_POST['btnBorrar'])) {
        $idComentario = $_POST['btnBorrar'];
        $sql = "DELETE FROM comentarios WHERE id = :idcomentario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idcomentario' => $idComentario]);
    }
    ?>

    <?php if ($_SESSION['usuario']['rol'] == 'moderador' || $_SESSION['usuario']['rol'] == 'administrador') { ?>
        <div class="text-center">
            <a href="moderarComentario.php" class="btn btn-warning">Gestionar Comentarios</a>
        </div>
    <?php } ?>

    <div class="text-center mt-3">
        <a href="pechaSesion.php" class="btn btn-secondary">Cerrar Sesión</a>
    </div>

</body>

</html>