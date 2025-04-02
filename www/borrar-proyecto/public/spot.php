<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Incluir la configuración de la base de datos
include('../includes/config.php');

// Obtener el ID del spot desde la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $spot_id = $_GET['id'];

    // Obtener los detalles del spot
    $stmt = $pdo->prepare('SELECT * FROM spots WHERE id = :id');
    $stmt->bindParam(':id', $spot_id);
    $stmt->execute();
    $spot = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Verificar si el spot existe
if (!$spot) {
    echo "Spot no encontrado.";
    exit();
}

// Verificar si el usuario ha añadido este spot como favorito
$stmt = $pdo->prepare('SELECT * FROM favorites WHERE user_id = :user_id AND spot_id = :spot_id');
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->bindParam(':spot_id', $spot_id);
$stmt->execute();
$is_favorite = $stmt->rowCount() > 0;

// Verificar si el usuario ya ha calificado este spot
$stmt = $pdo->prepare('SELECT * FROM ratings WHERE user_id = :user_id AND spot_id = :spot_id');
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->bindParam(':spot_id', $spot_id);
$stmt->execute();
$user_rating = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el usuario ya ha dejado un comentario
$stmt = $pdo->prepare('SELECT * FROM comments WHERE user_id = :user_id AND spot_id = :spot_id');
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->bindParam(':spot_id', $spot_id);
$stmt->execute();
$user_comment = $stmt->fetch(PDO::FETCH_ASSOC);

// Procesar añadir a favoritos
if (isset($_POST['add_favorite'])) {
    $stmt = $pdo->prepare('INSERT INTO favorites (user_id, spot_id) VALUES (:user_id, :spot_id)');
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':spot_id', $spot_id);
    $stmt->execute();
    header("Location: spot.php?id=$spot_id");  // Redirigir para evitar repostear el formulario
    exit();
}

// Procesar calificación
if (isset($_POST['rate_spot'])) {
    $rating = $_POST['rating'];

    if ($user_rating) {
        // Si ya existe una calificación, la actualizamos
        $stmt = $pdo->prepare('UPDATE ratings SET rating = :rating WHERE user_id = :user_id AND spot_id = :spot_id');
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':spot_id', $spot_id);
        $stmt->execute();
    } else {
        // Si no existe una calificación, la insertamos
        $stmt = $pdo->prepare('INSERT INTO ratings (user_id, spot_id, rating) VALUES (:user_id, :spot_id, :rating)');
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':spot_id', $spot_id);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();
    }
    header("Location: spot.php?id=$spot_id");  // Redirigir para evitar repostear el formulario
    exit();
}

// Obtener la calificación promedio
$stmt = $pdo->prepare('SELECT AVG(rating) AS average_rating FROM ratings WHERE spot_id = :spot_id');
$stmt->bindParam(':spot_id', $spot_id);
$stmt->execute();
$average_rating = $stmt->fetch(PDO::FETCH_ASSOC)['average_rating'];
?>

<!-- Incluir el CSS de Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Incluir la librería de Leaflet -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Mostrar detalles del spot -->
<h1><?php echo htmlspecialchars($spot['name']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($spot['description'])); ?></p>
<p><strong>Ubicación:</strong> <?php echo $spot['latitude']; ?>, <?php echo $spot['longitude']; ?></p>

<!-- Mapa de Leaflet -->
<div id="map" style="width: 100%; height: 400px;"></div>

<script>
    var map = L.map('map').setView([<?php echo $spot['latitude']; ?>, <?php echo $spot['longitude']; ?>], 13);

    // Agregar capa de mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Colocar un marcador en el spot
    L.marker([<?php echo $spot['latitude']; ?>, <?php echo $spot['longitude']; ?>]).addTo(map)
        .bindPopup("<b><?php echo htmlspecialchars($spot['name']); ?></b><br><?php echo nl2br(htmlspecialchars($spot['description'])); ?>")
        .openPopup();
</script>

<!-- Añadir a favoritos -->
<form action="spot.php?id=<?php echo $spot_id; ?>" method="POST">
    <?php if (!$is_favorite): ?>
        <button type="submit" name="add_favorite">Añadir a favoritos</button>
    <?php else: ?>
        <p>Este spot ya está en tus favoritos.</p>
    <?php endif; ?>
</form>

<!-- Mostrar la calificación promedio -->
<p><strong>Calificación Promedio:</strong> <?php echo round($average_rating, 1); ?> / 5</p>

<!-- Calificación del spot -->
<form action="spot.php?id=<?php echo $spot_id; ?>" method="POST">
    <label for="rating">Calificación (1 a 5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required value="<?php echo $user_rating['rating'] ?? ''; ?>">
    <button type="submit" name="rate_spot">Calificar</button>
</form>

<!-- Mostrar comentario -->
<form action="spot.php?id=<?php echo $spot_id; ?>" method="POST">
    <label for="comment">Comentario:</label>
    <textarea id="comment" name="comment"><?php echo $user_comment['comment'] ?? ''; ?></textarea>
    <button type="submit" name="add_comment">Comentar</button>
</form>