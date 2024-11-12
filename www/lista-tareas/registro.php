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

if (isset($_POST['btn-send'])) {

    // Preparar la consulta con marcadores de posición (?)
    $sentenciaEnviar = $conexion->prepare("INSERT INTO login (nombre, mail, pass) VALUES (?, ?, ?)");

    // Verificar si la preparación de la consulta fue exitosa
    if ($sentenciaEnviar === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }





    // Obtener los valores del formulario
    $nombre = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    // Enlazar los parámetros con bind_param()
    $sentenciaEnviar->bind_param("sss", $nombre, $mail, $pass);

    // Ejecutar la consulta
    if ($sentenciaEnviar->execute()) {
        echo "Registro insertado correctamente.";
    } else {
        echo "Error al insertar el registro: " . $sentenciaEnviar->error;
    }

    // Cerrar la consulta
    $sentenciaEnviar->close();
}

//Consultar Datos
if (isset($_POST['btn-datos'])) {

    $query = $conexion->prepare("SELECT * FROM login");
    $query->execute();
    $resultado = $query->get_result();

    // Mostrar los datos
    echo "<h3>Datos de la tabla 'login':</h3>";
    echo "<table class='table'><thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Password</th></tr></thead><tbody>";

    while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
        echo "<tr>
               <td>{$fila['id']}</td>
               <td>{$fila['nombre']}</td>
               <td>{$fila['mail']}</td>
               <td>{$fila['pass']}</td>
             </tr>";
    }
}




// Cerrar la conexión
$conexion->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.html">
        <button>ir</button>
    </form>
</body>

</html>