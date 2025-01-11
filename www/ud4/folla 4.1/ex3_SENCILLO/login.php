<?php
session_start();
require_once "conexion.php";


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Verifica si los campos de usuario y contraseña no están vacíos
if (!empty($username) && !empty($password)) {

    // Compara el nombre de usuario y la contraseña con los valores predeterminados (en este caso "ana" y "xan")
    // Si el usuario es "ana" y la contraseña es "abc123." o si el usuario es "xan" y la contraseña es "abc123."
    if (($username === "ana" && $password === "abc123.") || ($username === "xan" && $password === "abc123.")) {

        // Si la autenticación es correcta, almacena los datos del usuario en la sesión
        $_SESSION['datos'] = [
            "nome" => $username,  // Almacena el nombre de usuario en la variable 'nome'
            "contrasinal" => $password  // Almacena la contraseña en la variable 'contrasinal'
        ];

        // Redirige al usuario a la página "datos.php" después de iniciar sesión
        header("Location: datos.php");

        // Termina la ejecución del script para evitar que el código posterior se ejecute
        exit();
    } else {
        // Si el usuario o la contraseña son incorrectos, guarda un mensaje de error
        $error = "Usuario ou contrasinal incorrectos.";  // Error de autenticación
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST">
        <label>Usuario: <input type="text" name="username" required></label><br>
        <label>Contrasinal: <input type="password" name="password" required></label><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>