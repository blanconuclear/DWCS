<?php
// Habilitar CORS para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Configuración de la base de datos
$host = 'dbXdebug';
$dbname = 'react';
$username = 'root'; // Cambia esto si tienes otro usuario
$password = 'root'; // Añade la contraseña si la tienes

try {
    // Conexión con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar PDO para lanzar excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email)) {
        echo json_encode(["error" => "Todos los campos son obligatorios."]);
        exit();
    }

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "El correo electrónico no es válido."]);
        exit();
    }

    // Preparar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con los datos proporcionados
    try {
        $stmt->execute([':nombre' => $nombre, ':email' => $email]);
        echo json_encode(["success" => "Usuario registrado exitosamente."]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Error al registrar el usuario: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Método no permitido"]);
}
