<?php
session_start();

//recollemos os datos no array
$_SESSION['datos'] = array(
    "nome" => $_GET['usuario'],
    "contrasinal" => $_GET['pass']
);


// Mostrar os datos gardados
echo "<h2>Datos gardados na sesión:</h2>";
echo "Nome de usuario: " . $_SESSION['datos']['nome'] . "<br>";
echo "Contrasinal: " . $_SESSION['datos']['contrasinal'] . "<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="sesion1a.php">Ir a sesion1a </a>
</body>

</html>