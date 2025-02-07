<?php
$servidor = "dbXdebug";
$usuario = "Tarefa";
$pass = "Tarefa4.7";
$bbdd = "tarefa4.7";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $pass);
    // echo "conexion ok";
} catch (Exception $e) {
    echo "erro na conexion" . $e->getMessage();
}
