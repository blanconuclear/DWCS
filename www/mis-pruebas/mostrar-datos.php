<?php
$servidor = "dbXdebug";
$usuario = "root";
$passwd = "root";
$base = "misPruebas";

// CONECTAMOS
$conexion = new mysqli($servidor, $usuario, $passwd, $base);
if ($conexion->connect_error) {
    die("No es posible conectarse a la base de datos: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <button type="submit" class="btn btn-secondary" name="btn-datos">
            Ver datos
        </button>
    </form>


    <table border="1px">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>mail</th>
        </tr>

        <?php
        if (isset($_POST['btn-datos'])) {
            $query = $conexion->prepare("SELECT * FROM login");
            // Verificar si la preparación de la consulta fue exitosa
            if ($query === false) {
                die("Error en la preparación de la consulta: " . $conexion->error);
            }

            $query->execute();
            $resultado = $query->get_result();

            while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
                echo "<tr>";
                echo "<th>" . $fila['id'] . "</th>";
                echo "<th>" . $fila['nombre'] . "</th>";
                echo "<th>" . $fila['mail'] . "</th>";
                echo "</tr>";
            }
        }
        ?>

    </table>
</body>



</html>