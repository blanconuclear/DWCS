<?php

// Configuración de la base de datos
$host = 'dbXdebug';
$dbname = 'proxecto';
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
