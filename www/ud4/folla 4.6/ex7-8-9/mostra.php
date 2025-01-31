<?php
require_once "conexion.php";

$sql = "SELECT * FROM comentarios";
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
    <table border="1px">
        <tr>
            <th>nome</th>
            <th>comentario</th>
        </tr>

        <?php
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<th>" . $fila['nome'] . "</th>";
            echo "<th>" . $fila['comentario'] . "</th>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="gardar.php">Volver</a>
</body>

</html>