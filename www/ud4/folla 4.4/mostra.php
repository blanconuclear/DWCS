<?php
session_start();
require_once "conexion.php";

// Verificar si la sesión está iniciada y si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Mostrar bienvenida al usuario logueado
echo "Bienvenido, " . $_SESSION['usuario']['nome'] . " (" . $_SESSION['usuario']['rol'] . ")<br>";

// Verificar el rol del usuario
if ($_SESSION['usuario']['rol'] === 'usuario') {
    $query = "SELECT ultimaconexion FROM UsuariosTempo WHERE nome = :nome";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':nome' => $_SESSION['usuario']['nome']]);

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Tu última conexión fue el " . $resultado['ultimaconexion'] . "<br>";

    // Actualizar la última conexión
    $fecha = date('Y-m-d H:i:s');
    $updateSql = "UPDATE UsuariosTempo SET ultimaconexion = :ultimaConexion WHERE nome = :nome";
    $pdo->prepare($updateSql)->execute([':ultimaConexion' => $fecha, ':nome' => $_SESSION['usuario']['nome']]);
} else {
    // Eliminar Usuario
    if (isset($_POST['btn_eliminar'])) {
        $nomeEliminar = $_POST['btn_eliminar'];

        $sql = "DELETE FROM UsuariosTempo WHERE nome = :nome";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([':nome' => $nomeEliminar])) {
            echo "Usuario eliminado correctamente.<br>";
        } else {
            echo "Error al eliminar el usuario.<br>";
        }
    }

    //Cambiar Rol
    if (isset($_POST['btn_rol'])) {
        $rol = $_POST['rol'];
        $nome = $_POST['btn_rol'];

        $sql = "UPDATE UsuariosTempo SET rol = :rol WHERE nome = :nome";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':rol' => $rol, ':nome' => $nome]);

        if ($stmt->execute([':rol' => $rol, ':nome' => $nome])) {
            echo "rol modificado correctamente";
        }
    }


    // Obtener todos los usuarios
    $query = "SELECT nome, ultimaconexion, rol FROM UsuariosTempo";
    $stmt = $pdo->query($query);

    echo "<table border='1px'>
            <tr>
                <th>Usuario</th>
                <th>Última conexión</th>
                <th>Rol</th>
                <th>eliminar</th>
                <th>Seleccionar Rol</th>
            </tr>";
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$fila['nome']}</td>
            <td>{$fila['ultimaconexion']}</td>
            <td>{$fila['rol']}</td>
            <td>";

        //solo se muestra el botón de eliminar si no eres admin
        if ($fila['nome'] !== 'admin') {
            echo "<form method='post'>
                    <button name='btn_eliminar' value='{$fila['nome']}'>Eliminar</button>
                  </form>
                </td>";
            echo "<td>
                <form method='post'>
                    <select name='rol'>
                        <option disabled selected>-Rol-</option>
                        <option value='usuario'>Usuario</option>
                        <option value='administrador'>Administrador</option>
                    </select>
                  <button name='btn_rol' value='{$fila['nome']}'>Enviar</button>
                </form>";
        }
        echo "</td>
        </tr>";
    }
    echo "</table>";
}

// Enlace para cerrar sesión
echo "<a href='pecharsesion.php'>Cerrar sesión</a>";
