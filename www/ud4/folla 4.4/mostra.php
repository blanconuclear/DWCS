<?php
session_start();
require_once "conexion.php";

// Verificar si la sesión está iniciada y si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigir a login.php
    header('Location: login.php');
    exit();
}

// Mostrar bienvenida al usuario logueado
echo "Bienvenido, " . $_SESSION['usuario']['nome'] . " (" . $_SESSION['usuario']['rol'] . ")<br>";

// Verificar el rol del usuario
if ($_SESSION['usuario']['rol'] === 'usuario') {
    $query = "SELECT ultimaconexion FROM UsuariosTempo";
    $stmt = $pdo->query($query);

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Tu última conexión fue el " .  $resultado['ultimaconexion'] . "<br>";

    // Actualizar la última conexión
    $fecha = date('Y-m-d H:i:s');
    $updateSql = "UPDATE UsuariosTempo SET ultimaconexion = :ultimaConexion WHERE nome = :nome";
    $pdo->prepare($updateSql)->execute([':ultimaConexion' => $fecha, ':nome' => $_SESSION['usuario']['nome']]);
} else {
    // Si es un administrador, mostrar todos los usuarios

    $query = "SELECT nome, ultimaconexion, rol FROM UsuariosTempo";
    $stmt = $pdo->query($query);
    echo "<table><tr><th>Usuario</th><th>Última conexión</th><th>Rol</th></tr>";
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
        <td>{$fila['nome']}</td>
        <td>{$fila['ultimaconexion']}</td>
        <td>{$fila['rol']}</td>
            </tr>";
    }
    echo "</table>";
}

// Enlace para cerrar sesión
echo "<a href='pecharsesion.php'>Cerrar sesión</a>";
