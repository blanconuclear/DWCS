<?php
$host = "dbXdebug";
$dbname = "senderismo";
$user = "UsuarioBorrarPrueba";
$pass = "abc123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "conexion ok!";
} catch (Exception $e) {
    echo "Erro na conexion: " . $e->getMessage();
}
