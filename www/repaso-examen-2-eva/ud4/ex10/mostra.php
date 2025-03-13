<?php
session_start();

$nome = $_SESSION['usuario']['nome'];
$idioma = $_COOKIE['idioma'];
$mensaje = [
    'galego' => "ola, $nome",
    'ingles' => "welcome, $nome",
    'castellano' => "hola, $nome",
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
    <a href="pecharSesion.php">pechar sesion</a>

</body>

</html>