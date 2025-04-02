<?php
// Incluir la configuración de la base de datos
include('../includes/config.php');
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validar campos
    if (empty($email) || empty($password)) {
        $error = 'El correo y la contraseña son obligatorios.';
    } else {
        // Verificar si el correo está registrado
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Inicio de sesión exitoso
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: profile.php'); // Redirigir al perfil
            exit();
        } else {
            $error = 'Correo o contraseña incorrectos.';
        }
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form action="login.php" method="POST">
    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>