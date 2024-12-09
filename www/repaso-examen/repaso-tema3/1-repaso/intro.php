<?php
$servidor = "dbXdebug";
$usuario = "UsuarioBorrarPrueba";
$passwd = "abc123";
$base = "senderismo";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
} catch (Exception $e) {
    echo "Erro na conexión: " . $e->getMessage();
}

?>

<?php
// Mostrar formulario dinámico para insertar producto
if (isset($_GET['btn_engadir_producto'])) {
    echo "<form method='post'>
                <label for='novo_nome'>Nome: </label>
                <input type='text' name='novo_nome' required>
                <label for='novo_marca'>Marca: </label>
                <input type='text' name='novo_marca' required>
                <label for='novo_tipo'>Tipo: </label>
                <input type='text' name='novo_tipo' required>
                <label for='novo_prezo'>Prezo: </label>
                <input type='text' name='novo_prezo' required>
                <button type='submit' name='btn_insertar'>Insertar Producto</button>
            </form>";
}

//Lógica añadir producto
if (isset($_POST['btn_insertar'])) {
    $novo_nome = $_POST['novo_nome'];
    $novo_marca = $_POST['novo_marca'];
    $novo_tipo = $_POST['novo_tipo'];
    $novo_prezo = (int) $_POST['novo_prezo'];
    $novo_imaxe = "ChirucaCares.jpg";

    $sql = "insert into material (Nome,Marca,Tipo,Prezo,Imaxe)
                values (:Nome,:Marca,:Tipo,:Prezo,:Imaxe)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':Nome' => $novo_nome, ':Tipo' => $novo_tipo, ':Marca' => $novo_marca, ':Prezo' => $novo_prezo, ':Imaxe' => $novo_imaxe]);

    $sql = $stmt;
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
    <form action="mostrar.php" method="get">
        <button name="listar_todo">Lista todos os produtos</button>
        <button name="listar_ordenados_marca">Listar ordenados pola marca</button>
        <button name="listar_ordenados_precio">Lista Ordenados polo prezo</button>

        <label for="nombre_marca">Buscar por unha marca</label>
        <input type="text" name="nombre_marca">
        <button name="buscar_nombre_marca">Buscar Nombre marca</button>

        <label for="nombre_calquer_campo">Buscar por calquera campo da base de datos</label>
        <input type="text" name="nombre_calquer_campo">
        <button name="buscar_calquer_campo">Buscar calquer campo</button>

        <select name="selectTipo">
            <option value="" selected>Selecciona unha opción</option>
            <?php
            $query = $pdo->query("SELECT DISTINCT Tipo FROM material");


            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                $tipo = $fila['Tipo'];
                echo "<option value='$tipo'>$tipo</option>";
            }
            ?>
        </select>
        <button name="listar_tipo_producto">Listar tipo Producto</button>

    </form>
    <form action="">
        <button name="btn_engadir_producto">Engadir producto</button>
    </form>


</body>

</html>