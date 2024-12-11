<?php
include_once 'conexion.php';

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
</body>

</html>