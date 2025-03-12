<?php

try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=tema4", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage()); // Muestra el error y detiene la ejecución
}
