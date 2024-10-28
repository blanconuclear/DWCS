<?php
// Conexión a la base de datos
$conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Crear la consulta SQL básica
$sql = "SELECT * FROM peliculas";

// Si el usuario está buscando un título específico
if (isset($_GET['buscar_exemplar'])) {
    $buscar_exemplar = $_GET['buscar_exemplar'];
    $sql = "SELECT * FROM peliculas WHERE titulo LIKE $buscar_exemplar";
}

// Si el usuario quiere ver películas con duración mayor a un valor específico
if (isset($_GET['maior_duracion'])) {
    $maior_duracion = $_GET['maior_duracion'];
    $sql = "SELECT * FROM peliculas WHERE duracion > $maior_duracion";
}

// Ordenar según el botón presionado
if (isset($_GET['order'])) {
    $order = $_GET['order'];

    if ($order == 'order_duracion') {
        $sql = "SELECT * FROM peliculas ORDER BY duracion ASC";
    } elseif ($order == 'order_director') {
        $sql = "SELECT * FROM peliculas ORDER BY director ASC";
    } elseif ($order == 'order_titulo') {
        $sql = "SELECT * FROM peliculas ORDER BY titulo ASC";
    } elseif ($order == 'listado_completo') {
        $sql = "SELECT * FROM peliculas ";
    }
}

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    echo "<p>" . "O número de exemplares atopados é:" . mysqli_num_rows($resultado) . "</p>";
    ?>


</body>

</html>