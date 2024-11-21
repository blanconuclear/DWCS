<?php
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Productos y Familias</title>

</head>

<body>
    <h1>Panel de Edición</h1>
    <div class="menu">
        <form method="POST">
            <button name="accion" value="nuevo_producto">Nuevo Producto</button>
            <button name="accion" value="actualizar_producto">Actualizar Producto</button>
            <button name="accion" value="eliminar_producto">Eliminar Producto</button>
            <button name="accion" value="nueva_familia">Nueva Familia</button>
            <button name="accion" value="actualizar_familia">Actualizar Familia</button>
            <button name="accion" value="eliminar_familia">Eliminar Familia</button>
        </form>
    </div>

    <?php
    if (isset($_POST['accion']) && $_POST['accion'] === 'nuevo_producto') {
        // Mostrar el formulario para crear un nuevo producto
        echo "<div class='form-container'>
                <h2>Nuevo Producto</h2>
                <form method='POST'>
        
                    <label for='nombre'>Nombre:</label>
                    <input type='text' name='nombre'required>

                    <label for='nombre_corto'>Nombre Corto:</label>
                    <input type='text' name='nombre_corto'  required>

                    <label for='descripcion'>Descripción:</label>
                    <input type='text' name='descripcion'  required>

                    <label for='pvp'>PVP:</label>
                    <input type='number' name='pvp' step='0.01' required>

                    <label for='familias'>Familia:</label>
                    <select name='familias' required>
                        <option value='' selected>Selecciona unha opción</option>";

        // Consultar todas las familias desde la base de datos
        $sentenciaDatos = $conexion->prepare("SELECT * FROM familias");
        $sentenciaDatos->execute();
        $resultado = $sentenciaDatos->get_result();

        while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
            $nombre = $fila['nombre'];
            $cod = $fila['cod'];
            echo "<option value='$cod'>$nombre</option>";
        }

        echo "          <option value='todos'>Todos</option>
                    </select>

                    <button type='submit' name='btn_nuevo_producto'>Guardar Producto</button>
                </form>
            </div>";
    }
    ?>
</body>


<?php
if (isset($_POST['btn_nuevo_producto'])) {
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $descripcion = $_POST['descripcion'];
    $pvp = $_POST['pvp'];
    $familias = $_POST['familias'];

    $sentenciaInsertar = $conexion->prepare("INSERT INTO productos (nombre, nombre_corto, descripcion,pvp,familia) VALUES (?, ?, ?, ?, ?)");
    $sentenciaInsertar->bind_param("sssis", $nombre, $nombre_corto, $descripcion, $pvp, $familias);
    $sentenciaInsertar->execute();
    $sentenciaInsertar->close();
}

?>

</html>