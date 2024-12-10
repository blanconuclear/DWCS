<?php
$host = "dbXdebug";
$dbname = "senderismo";
$user = "UsuarioBorrarPrueba";
$pass = "abc123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "conexion ok!";
} catch (Exception $e) {
    echo "erro na conexion: " . $e->getMessage();
}

//Seleccionar todo
$sql = "SELECT DISTINCT Tipo FROM material";
$stmt = $pdo->query($sql);

//Formulario crear producto
if (isset($_POST['btn_producto'])) {
    echo "    <form method='post'>
        <label for='nome_crear'>Nome:</label>
        <input type='text' name='nome_crear' />
        <label for='marca_crear'>Marca:</label>
        <input type='text' name='marca_crear' />
        <label for='tipo_crear'>Tipo:</label>
        <input type='text' name='tipo_crear' />
        <label for='prezo_crear'>Prezo:</label>
        <input type='text' name='prezo_crear' />
        <button name='btn_crear_producto'>Enviar</button>
    </form>";
}

//Consulta crear producto
if (isset($_POST['btn_crear_producto'])) {
    $nome_crear = $_POST['nome_crear'];
    $marca_crear = $_POST['marca_crear'];
    $tipo_crear = $_POST['tipo_crear'];
    $prezo_crear = $_POST['prezo_crear'];
    $imaxe_crear = "NorthFaceFire.jpg";

    $sql = "INSERT INTO material (Nome,Marca,Tipo,Prezo,Imaxe)
            VALUES(:nome,:marca,:tipo,:prezo,:imaxe)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => $nome_crear, ':marca' => $marca_crear, ':tipo' => $tipo_crear, ':prezo' => $prezo_crear, ':imaxe' => $imaxe_crear]);

    echo "Producto engadido con exito";
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
    <form action="mostra.php" method="get">
        <button name="listar_todo">Lista todos os produtos</button>
        <button name="ordenar_marca">Listar ordenados pola marca</button>
        <button name="ordenar_prezo">Lista Ordenados polo prezo</button>

        <label for="buscar_marca">Buscar por unha marca</label>
        <input type="text" name="buscar_marca">
        <button name="btn_buscar_marca">buscar</button>

        <label for="
        ">Buscar por calquera campo da base de dato</label>
        <input type="text" name="buscar_calquer_campo">
        <button name="btn_buscar_calquer_campo">Buscar por calquer campo</button>

        <select name="selectTipo">
            <option value="" selected>Selecciona un tipo</option>
            <?php
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tipo = $fila['Tipo'];
                echo "<option value='$tipo'>$tipo</option>";
            }
            ?>
        </select>
        <button name="btn_selectTipo">Enviar Tipo</button>
    </form>
    <form method="post">
        <button name="btn_producto">Crear Producto</button>
    </form>
</body>

</html>