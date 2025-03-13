<?php

try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=tema4", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "conexion ok";
} catch (PDOException $e) {
    die($e->getMessage());
}
