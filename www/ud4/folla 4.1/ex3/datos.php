<?php
session_start();
//$_SESSION = array();
//session_destroy();
require_once "conexion.php";

// Verificar si usuario y contraseña están definidos
if (!isset($_SESSION['datos']) && !isset($_GET['usuario'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['datos']) && isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    $pass = $_GET['pass'];

    // Validar credenciales
    if (($usuario == "ana" || $usuario == "xan") && $pass == "abc123.") {
        $_SESSION['datos'] = array(
            "nome" => $usuario,
            "contrasinal" => $pass
        );
    } else {
        header('Location: login.php');
        exit;
    }
}

//Form crear cliente si eres Ana
if (isset($_GET['btn_crear'])) {
    echo "<form method='post'>
    <label for='crear_numero'>Numero:</label>
    <input type='text' name='crear_numero' />
    <label for='crear_nome'>Nome:</label>
    <input type='text' name='crear_nome' />
    <label for='crear_num_empregado_asig'>Num_empregado_asig:</label>
    <input type='text' name='crear_num_empregado_asig' />
    <label for='crear_limite_de_credito'>limite_de_credito:</label>
    <input type='text' name='crear_limite_de_credito' />

    <button name='btn_enviar_crear'>Enviar</button>
  </form>";
}

if (isset($_POST['btn_enviar_crear'])) {
    $crear_numero = $_POST['crear_numero'];
    $crear_nome = $_POST['crear_nome'];
    $crear_num_empregado_asig = $_POST['crear_num_empregado_asig'];
    $crear_limite_de_credito =  $_POST['crear_limite_de_credito'];

    $sql = "INSERT INTO cliente (numero,nome,num_empregado_asignado,limite_de_credito)
                   VALUES (:numero,:nome,:num_empregado_asignado,:limite_de_credito)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':numero' => $crear_numero,
        ':nome' => $crear_nome,
        ':num_empregado_asignado' => $crear_num_empregado_asig,
        ':limite_de_credito' => $crear_limite_de_credito,
    ]);
}


// Consultar datos
$sql = "SELECT * FROM cliente";

// Ordenar por nombre empresa
if (isset($_GET['ordenar_empresa'])) {
    $sql =  "SELECT * FROM cliente ORDER BY nome";
}

// Ordenar por empleado asignado
if (isset($_GET['ordenar_empregado'])) {
    $sql =  "SELECT * FROM cliente ORDER BY num_empregado_asignado";
}

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
    <p>Hola <?php echo htmlspecialchars($_SESSION['datos']['nome']); ?></p>

    <!-- Mostrar datos -->
    <table border="1px">
        <tr>
            <th>Número</th>
            <th>Nome</th>
            <th>Num_empregado_asig</th>
            <th>Límite crédito</th>
        </tr>
        <?php
        if (!empty($stmt)) {
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$fila['numero']}</td>
                        <td>{$fila['nome']}</td>
                        <td>{$fila['num_empregado_asignado']}</td>
                        <td>{$fila['limite_de_credito']}</td>
                    </tr>";
            }
        }
        ?>
    </table>

    <form method="get" action="">
        <button type="submit" name="ordenar_empresa">Ordenar por nome empresa</button>
        <button name="ordenar_empregado">Ordenar empregado asignado</button>
    </form>

    <?php
    // Mostrar el botón de añadir registro solo si el usuario es "ana"
    if ($_SESSION['datos']['nome'] === "ana") {
        echo '<form method="get">
                <button type="submit" name="btn_crear">Engadir rexistro</button>
              </form>';
    }
    ?>
</body>

</html>