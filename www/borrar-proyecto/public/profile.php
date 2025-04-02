<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Incluir la configuración de la base de datos
include('../includes/config.php');

// Obtener datos del usuario
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener spots favoritos
$stmt = $pdo->prepare('SELECT spots.* FROM spots 
                       JOIN favorites ON favorites.spot_id = spots.id
                       WHERE favorites.user_id = :user_id');
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Mostrar información del usuario -->
<h1>Bienvenido, <?php echo htmlspecialchars($user['name']); ?></h1>
<p>Correo electrónico: <?php echo htmlspecialchars($user['email']); ?></p>

<h2>Spots Favoritos</h2>
<ul>
    <?php foreach ($favorites as $spot): ?>
        <li>
            <a href="spot.php?id=<?php echo $spot['id']; ?>"><?php echo htmlspecialchars($spot['name']); ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Enlace para cerrar sesión -->
<a href="logout.php">Cerrar sesión</a>