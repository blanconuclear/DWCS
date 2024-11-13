<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Lista de Tareas</h2>
            <form method="post" action="logout.php">
                <button type="submit" class="btn btn-danger btn-sm" name="btn-logout">Cerrar sesión</button>
            </form>
        </div>

        <!-- Formulario para agregar tareas -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Agregar Tarea</h4>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título de la Tarea</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa el título" required>
                    </div>
                    <div class="mb-3">
                        <label for="tarea" class="form-label">Descripción de la Tarea</label>
                        <textarea class="form-control" id="tarea" name="tarea" rows="4" placeholder="Describe la tarea" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-agregar">Agregar Tarea</button>
                </form>
            </div>
        </div>

        <?php
        $servidor = "dbXdebug";
        $usuario = "root";
        $passwd = "root";
        $base = "misPruebas";

        // CONECTAMOS
        $conexion = new mysqli($servidor, $usuario, $passwd, $base);
        if ($conexion->connect_error) {
            die("No es posible conectar a la base de datos: " . $conexion->connect_error);
        }
        $conexion->set_charset("utf8");

        $user_id = $_SESSION['user_id'];

        // Insertar tarea en la base de datos
        if (isset($_POST['btn-agregar'])) {
            $titulo = $_POST['titulo'];
            $tarea = $_POST['tarea'];


            // Consulta SQL para insertar la nueva tarea, incluyendo el estado
            $sentenciaInsertar = $conexion->prepare("INSERT INTO tarea (titulo, tarea, user_id) VALUES (?, ?, ?)");
            $sentenciaInsertar->bind_param("ssi", $titulo, $tarea, $user_id);
            $sentenciaInsertar->execute();
            $sentenciaInsertar->close();
        }


        // Borrar tarea de la base de datos
        if (isset($_POST['btn-eliminar'])) {
            $id = $_POST['btn-eliminar'];

            $sql_eliminar = $conexion->prepare("DELETE FROM tarea WHERE id = ? AND user_id = ?");
            $sql_eliminar->bind_param("ii", $id, $user_id);
            $sql_eliminar->execute();
        }

        // Mostrar datos de la tabla "tarea" para el usuario logueado
        $sentenciaDatos = $conexion->prepare("SELECT * FROM tarea WHERE user_id = ?");
        $sentenciaDatos->bind_param("i", $user_id);
        $sentenciaDatos->execute();
        $resultado = $sentenciaDatos->get_result();

        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>Tareas</h4>";
        echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                </tr>
            </thead>
        <tbody>";

        //Contador para indice de tareas
        $contador = 1;
        while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
            $id = $fila['id'];
            $titulo = $fila['titulo'];
            $tarea = $fila['tarea'];


            echo "<tr>
                <td>$contador</td>
                <td>$id</td>
                <td>$titulo</td>
                <td>$tarea</td>
                <td>
                    <form method='post' style='display:inline;'>
                        <button type='submit' class='btn btn-danger btn-sm' name='btn-eliminar' value='$id'>Eliminar</button>
                    </form>
                </td>
              </tr>";

            //Sumamos al contador.
            $contador++;
        }
        echo "</tbody></table>";
        echo "</div></div>";

        $sentenciaDatos->close();
        $conexion->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <!--Solución temporal para que cada vez que se recarga la página no cree tareas repetidas.-->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>