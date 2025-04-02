<?php
// Incluir la configuración de la base de datos
include('../includes/config.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Validar campos
    if (empty($name) || empty($email) || empty($password) || empty($password_confirm)) {
        $error = 'Todos los campos son obligatorios.';
    } elseif ($password !== $password_confirm) {
        $error = 'Las contraseñas no coinciden.';
    } else {
        // Verificar si el correo ya está registrado
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $error = 'El correo electrónico ya está registrado.';
        } else {
            // Registrar al usuario
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            if ($stmt->execute()) {
                $success = 'Registro exitoso. Ahora puedes iniciar sesión.';
            } else {
                $error = 'Hubo un error al registrar el usuario.';
            }
        }
    }
}
?>

<!-- Aquí va el formulario HTML -->
<form action="register.php" method="POST">
    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirm">Confirmar Contraseña:</label>
        <input type="password" id="password_confirm" name="password_confirm" required>
    </div>
    <button type="submit">Registrar</button>
</form>

<a href="login.php">Login</a>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
if (isset($success)) {
    echo "<p style='color:green;'>$success</p>";
}
?>