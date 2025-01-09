<?php

$usuario = $_GET['usuario'];
$pass = $_GET['pass'];

if (($usuario == "ana" || $usuario == "xan") && $pass == "abc123.") {
    echo "todo correcto";
} else {
    header('Location: login.php');
}

$_SESSION['datos'] = array(
    "nome" => $_GET['usuario'],
    "contrasinal" => $_GET['pass']
);

echo "<br>";
echo "Hola " . $_SESSION['datos']['nome'];


//mostrar todos os datos
$sql = "SELECT * FROM cliente";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>