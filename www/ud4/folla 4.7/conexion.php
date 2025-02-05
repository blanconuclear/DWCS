<?php
$servidor = "dbXdebug";
$usuario = "root";
$pass = "root";
$bbdd = "tarefa4.7";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $pass);
    // echo "conexion ok";
} catch (Exception $e) {
    echo "erro na conexion" . $e->getMessage();
}
