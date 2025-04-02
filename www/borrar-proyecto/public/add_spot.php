<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Incluir la configuración de la base de datos
include('../includes/config.php');

// Procesar el formulario cuando se envía
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Validar que los campos no estén vacíos
    if (!empty($name) && !empty($latitude) && !empty($longitude)) {
        // Insertar los datos en la base de datos
        $stmt = $pdo->prepare('INSERT INTO spots (user_id, name, description, latitude, longitude) VALUES (:user_id, :name, :description, :latitude, :longitude)');
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        $stmt->execute();

        // Redirigir al usuario al nuevo spot
        header('Location: spot.php?id=' . $pdo->lastInsertId());
        exit();
    } else {
        $error_message = "Por favor, complete todos los campos requeridos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Spot</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h1>Añadir Spot</h1>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

    <form action="add_spot.php" method="POST">
        <label for="name">Nombre del Spot:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="latitude">Latitud:</label>
        <input type="text" id="latitude" name="latitude" required readonly><br>

        <label for="longitude">Longitud:</label>
        <input type="text" id="longitude" name="longitude" required readonly><br>

        <div id="map"></div>

        <button type="submit" name="submit">Añadir Spot</button>
    </form>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([43.3235, -1.9830], 13); // Coordenadas iniciales

        // Cargar el mapa con OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var marker;

        function onMapClick(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;

            // Llamar a la API de Nominatim para obtener el nombre del lugar
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        document.getElementById('name').value = data.display_name;
                    } else {
                        document.getElementById('name').value = "Ubicación desconocida";
                    }
                })
                .catch(error => console.error("Error obteniendo el nombre del lugar:", error));
        }

        map.on('click', onMapClick);
    </script>

</body>

</html>