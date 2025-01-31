<?php
$servidor = "dbXdebug";
$usuario = "root";
$pass = "root";
$bbdd = "usuarios_comentarios";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $pass);
    //echo "conexion ok";
} catch (Exception $e) {
    echo "erro na conexion" . $e->getMessage();
}
