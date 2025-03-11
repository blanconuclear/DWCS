<?php
session_start();

$idioma = $_COOKIE['idioma'] ?? 'castellano';
$nome = $_SESSION['usuario']['nome'];

// Mensajes en diferentes idiomas
$mensajes = [
    "galego" => "Benvido, $nome!",
    "castellano" => "¡Bienvenido, $nome!",
    "english" => "Welcome, $nome!"
];

echo htmlspecialchars($mensajes[$idioma]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="pechaSesion.php">Pechar sesion</a>
</body>

</html>