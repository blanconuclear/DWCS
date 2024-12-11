<?php
$host = "dbXDebug";
$dbname = "senderismo";
$user = "probaUsuario2";
$pass = "abc123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "conexion ok!";
} catch (Exception $e) {
    echo "Error na conexion: " . $e->getMessage();
}
