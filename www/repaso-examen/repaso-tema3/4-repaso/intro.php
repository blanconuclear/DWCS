<?php
include_once 'conexion.php';


//Form crear producto
if (isset($_POST['btn_crear_producto'])) {
    echo "<form method='post'>
    <label for='crear_nome'>Nome:</label>
    <input type='text' name='crear_nome' />
    <label for='crear_marca'>Marca:</label>
    <input type='text' name='crear_marca' />
    <label for='crear_tipo'>Tipo:</label>
    <input type='text' name='crear_tipo' />
    <label for='crear_prezo'>Prezo:</label>
    <input type='text' name='crear_prezo' />
    <label for='crear_imaxe'>Imaxe:</label>
    <input type='text' name='crear_imaxe' />

    <button name='btn_enviar_crear'>Enviar</button>
  </form>";
}

if (isset($_POST['btn_enviar_crear'])) {
    $crear_nome = $_POST['crear_nome'];
    $crear_marca = $_POST['crear_marca'];
    $crear_tipo = $_POST['crear_tipo'];
    $crear_prezo = (int) $_POST['crear_prezo'];
    $crear_imaxe = $_POST['crear_imaxe'] . ".jpg";

    $sql = "INSERT INTO material (Nome,Marca,Tipo,Prezo,Imaxe)
                   VALUES (:nome,:marca,:tipo,:prezo,:imaxe)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $crear_nome,
        ':marca' => $crear_marca,
        ':tipo' => $crear_tipo,
        ':prezo' => $crear_prezo,
        ':imaxe' => $crear_imaxe,
    ]);
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

        <label for="buscar_calquer_campo">Buscar por calquera campo da base de dato</label>
        <input type="text" name="buscar_calquer_campo">
        <button name="btn_buscar_calquer_campo">Buscar por calquer campo</button>

        <select name="selectTipo">
            <option value="" selected>Selecciona tipo</option>
            <?php
            $sql = "SELECT DISTINCT Tipo FROM material";
            $stmt = $pdo->query($sql);

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tipo = $fila['Tipo'];

                echo "<option value='$tipo'>$tipo</option>";
            }
            ?>
        </select>
        <button name="btn_selectTipo">Enviar Tipo</button>
    </form>
    <form method="post">
        <button name="btn_crear_producto">Crear Producto</button>
    </form>
</body>

</html>