<?php
// Conexión a la base de datos
$conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Crear la consulta SQL básica
$sql = "SELECT * FROM peliculas";
$conditions = [];

// Si el usuario está buscando un título específico
if (isset($_GET['buscar_exemplar_btn'])) {
    $buscar_exemplar = $_GET['buscar_exemplar'];
    $conditions[] = "titulo LIKE '%$buscar_exemplar%'";
}

// Si el usuario quiere ver películas con duración mayor a un valor específico
if (isset($_GET['buscar_maior_btn'])) {
    $maior_duracion = (int)$_GET['maior_duracion'];
    $conditions[] = "duracion > $maior_duracion";
}

// Construir la cláusula WHERE si hay condiciones
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

// Ordenar según el botón presionado
if (isset($_GET['order'])) {
    $order = $_GET['order'];

    if ($order == 'order_duracion') {
        $sql .= " ORDER BY duracion ASC";
    } elseif ($order == 'order_director') {
        $sql .= " ORDER BY director ASC";
    } elseif ($order == 'order_titulo') {
        $sql .= " ORDER BY titulo ASC";
    }
}

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Manejo de errores en la consulta
if (!$resultado) {
    die("Error en la consulta SQL: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: green;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-right: 50px;
        }
    </style>
</head>

<body>
    <form action="" method="get">
        <label for="buscar_exemplar">Buscar Exemplar</label>
        <input type="text" name="buscar_exemplar" id="">
        <button name="buscar_exemplar_btn">Buscar</button>
        <br>
        <br>

        <button name="order" value="listado_completo">Ver listado completo das películas</button>
        <button name="order" value="order_duracion">Ordenado pola duración películas</button>
        <button name="order" value="order_director">Ordenado polo director</button>
        <button name="order" value="order_titulo">Ordenado polo título</button>
        <br>
        <br>

        <label for="maior_duracion">Con duración maior que: </label>
        <input type="text" name="maior_duracion" id="">
        <button name="buscar_maior_btn">Buscar</button>
    </form>

    <table border='1'>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Duración</th>
        </tr>
        <?php
        // Mostrar los resultados en la tabla
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "
            <tr>
                <td>{$fila['titulo']}</td>
                <td>{$fila['director']}</td>
                <td>{$fila['duracion']}</td>
            </tr>
            ";
        }
        ?>
    </table>
    <?php
    // Mostrar el número de resultados encontrados
    echo "<p>O número de exemplares atopados é: " . mysqli_num_rows($resultado) . "</p>";

    // Cerrar la conexión
    mysqli_close($conexion);
    ?>
</body>

</html>