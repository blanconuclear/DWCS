<?php
session_start();

$nome = $_SESSION['usuario']['nome'];
$idioma = $_COOKIE['idioma'];

$mensaje = [
    'galego' => "ola, $nome",
    'castellano' => "hola, $nome",
    'ingles' => "welcome, $nome",
];

echo htmlspecialchars($mensaje[$idioma]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="pecharSesion.php">Pechar Sesión</a>
</body>

</html>