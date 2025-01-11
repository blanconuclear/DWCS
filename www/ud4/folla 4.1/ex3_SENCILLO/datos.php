<?php
session_start();
require_once "conexion.php";

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
        echo '<form method="post" action="engadeRexistro.php">
              <input type="submit" value="Engadir rexistro">
              </form>';
    }
    ?>
</body>

</html>