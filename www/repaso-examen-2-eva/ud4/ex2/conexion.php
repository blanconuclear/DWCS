<?php
$host = "dbXdebug";
$db = "tema4";
$user = "root";
$pass = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    //echo "conexion ok";
} catch (PDOException $e) {
    $e->getMessage();
}
