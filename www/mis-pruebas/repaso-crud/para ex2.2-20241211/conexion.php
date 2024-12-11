<?php

$host = "dbXdebug";
$dbname = "musica";
$user = "probaUsuario";
$pass = "abc123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    echo "Erro na conexion: " . $e->getMessage();
}
