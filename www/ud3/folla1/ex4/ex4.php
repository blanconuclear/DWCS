<?php
$conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");



// Verificar si se ha enviado el formulario de inserción
if (isset($_GET['btn_engadir'])) {
    $titulo = $_GET['titulo'];
    $autor = $_GET['autor'];
    $editorial = $_GET['editorial'];

    $sql_insert = "INSERT INTO libro (titulo, autor, editorial)
                   VALUES ('$titulo', '$autor', '$editorial')";

    if (mysqli_query($conexion, $sql_insert)) {
        echo "Libro agregado exitosamente";
    } else {
        echo "Error al agregar el libro: " . mysqli_error($conexion);
    }
}

// Verificar si se ha enviado el formulario de eliminación
if (isset($_GET['btn_borrar'])) {
    $titulo_borrar = $_GET['titulo_borrar'];
    $autor_borrar = $_GET['autor_borrar'];
    $editorial_borrar = $_GET['editorial_borrar'];

    $sql_delete = "DELETE FROM libro 
                   WHERE titulo = '$titulo_borrar' 
                   AND autor = '$autor_borrar' 
                   AND editorial = '$editorial_borrar'";

    if (mysqli_query($conexion, $sql_delete)) {
        echo "Libro borrado exitosamente";
    } else {
        echo "Error al borrar el libro: " . mysqli_error($conexion);
    }
}

// Consulta para seleccionar todos los libros después de posibles modificaciones
$sql = "SELECT * FROM libro";
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
    <form action="" method="GET">
        <p>Engadir libro</p>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="">

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="">

        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="">
        <button name="btn_engadir" type="submit">Engadir</button>
        <br><br>

        <p>Borrar libro</p>
        <label for="titulo_borrar">Titulo:</label>
        <input type="text" name="titulo_borrar" id="">

        <label for="autor_borrar">Autor:</label>
        <input type="text" name="autor_borrar" id="">

        <label for="editorial_borrar">Editorial:</label>
        <input type="text" name="editorial_borrar" id="">
        <button name="btn_borrar" type="submit">Eliminar</button>
    </form>

    <table border="1px">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editorial</th>
        </tr>

        <?php
        // Mostrar los resultados en la tabla
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>
                <td>{$fila['titulo']}</td>
                <td>{$fila['autor']}</td>
                <td>{$fila['editorial']}</td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>