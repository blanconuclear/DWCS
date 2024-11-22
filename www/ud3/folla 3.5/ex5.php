<?php
//Conexión
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
    echo "Conexión Ok!.<br>";
} catch (Exception $e) {
    echo "Erro na conexión: " . $e->getMessage();
    exit; // Salimos si no se puede conectar
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <label for="buscar_nome">Nome: </label>
        <input type="text" name="buscar_nome">

        <label for="buscar_apelido">Apelido:</label>
        <input type="text" name="buscar_apelido">

        <button name="btn_buscar">Buscar</button>
    </form>


    <?php
    if (isset($_GET['btn_buscar'])) {
        $nome = $_GET['buscar_nome'] ?? null;
        $apelido = $_GET['buscar_apelido'] ?? null;

        try {
            // Construcción de la consulta SQL
            if (!empty($nome) && !empty($apelido)) {
                $sql = "SELECT * FROM cliente WHERE nome LIKE :nome AND apelido LIKE :apelido";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nome' => "%$nome%",
                    ':apelido' => "%$apelido%",
                ]);
            } elseif (!empty($nome)) {
                $sql = "SELECT * FROM cliente WHERE nome LIKE :nome";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':nome' => "%$nome%"]);
            } elseif (!empty($apelido)) {
                $sql = "SELECT * FROM cliente WHERE apelido LIKE :apelido";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':apelido' => "%$apelido%"]);
            } else {
                // Si no hay filtros, mostramos un mensaje
                echo "Por favor, introduce un nome o apelido para buscar.";
                exit;
            }

            // Procesar los resultados dentro del bloque try
            echo "<h3>Resultados:</h3>";
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<pre>" . htmlspecialchars(print_r($fila, true)) . "</pre>";
            }
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>