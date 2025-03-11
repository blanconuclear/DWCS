<?php
session_start();
require_once 'conexion.php';


// Obtener los datos de $_POST con validación
$nome = $_POST['nome'] ?? null;
$pass = $_POST['pass'] ?? null;
$idioma = $_POST['selectIdioma'] ?? 'castellano'; // Si no se selecciona idioma, por defecto 'castellano'

// Validar que los datos requeridos no estén vacíos
if (!$nome || !$pass) {
    die("Error: Usuario o contraseña no proporcionados.");
}

// Guardar idioma en cookie
setcookie("idioma", $idioma, time() + 30000);

// Buscar usuario en la base de datos
$sql = "SELECT * FROM usuariosTempo WHERE nome = :nome";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome' => $nome]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si la contraseña es correcta
if ($resultado && password_verify($pass, $resultado['passwd'])) { // Asegurar que la columna es 'passwd' y no 'pass'

    $_SESSION['usuario'] = [
        'nome' => $resultado['nome'],
        'rol' => $resultado['rol'],
        'ultimaconexion' => $resultado['ultimaconexion']
    ];

    // Actualizar última conexión
    $sql = "UPDATE usuariosTempo SET ultimaconexion = NOW() WHERE nome = :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => $nome]);

    header("Location: mostra.php");
    exit();
} else {
    echo "Error: Usuario o contraseña incorrectos.";
}
