<?php
require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];
    $ultimaconexion = '1970-01-01 00:00:00';

    try {

        $sql = "INSERT INTO UsuariosTempo (nome, passwd, ultimaconexion, rol) VALUES (:nome, :passwd, :ultimaconexion, :rol)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nome' => $nome, 'passwd' => $passwd, 'ultimaconexion' => $ultimaconexion, 'rol' => $rol]);

        echo "Usuario registrado exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
