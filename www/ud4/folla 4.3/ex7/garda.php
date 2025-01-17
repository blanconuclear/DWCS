<?php
require_once "conexion.php";

$nome = $_POST['nome'];
$contrasinal = $_POST['passwd'];

$passHasheado = password_hash($contrasinal, PASSWORD_DEFAULT);

// Inserción dos datos na táboa usando consulta preparada
$sql = 'INSERT INTO usuario (nome, contrasinal) VALUES (:nome, :contrasinal)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => $nome,
    ':contrasinal' => $passHasheado
]);

echo '<p>Usuario rexistrado correctamente!</p>';
echo '<a href="rexistro.php">Volver ao formulario</a>';
