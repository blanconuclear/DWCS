<?php
include_once 'vehiculo.php';
session_start();


if (!isset($_SESSION['flota'])) {
    $_SESSION['flota'] = [];
}


if (isset($_POST['btnEngadirVehiculo'])) {
    $matricula = $_POST['matricula'];
    $modelo = $_POST['modelo'];
    $kms = $_POST['kms'];

    $novoVehiculo = new Vehiculo($matricula, $modelo, $kms);
    $_SESSION['flota'][] = $novoVehiculo;
}

if (isset($_POST['btnGuardar'])) {
    file_put_contents('./flota.txt', serialize($_SESSION['flota']));
}

if (isset($_POST['btnRecuperar'])) {
    if (file_exists('/tmp/flota.txt')) {
        $_SESSION['flota'] = unserialize(file_get_contents('./flota.txt'));
    }
}


if (isset($_POST['btnCerrarSesion'])) {
    session_unset();
    session_destroy();
    $_SESSION['flota'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Xestión da Flota de Vehículos</h2>

    <form method="post">
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" required>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required>

        <label for="kms">Quilómetros:</label>
        <input type="number" name="kms" required>

        <button type="submit" name="btnEngadirVehiculo">Engadir Vehículo</button>

    </form>

    <table border="1px">
        <tr>
            <th>Matrícula</th>
            <th>Modelo</th>
            <th>Kms</th>
        </tr>
        <?php
        foreach ($_SESSION['flota'] as $vehiculo) {
            echo $vehiculo->mostraEnTR();
        }
        ?>
    </table>

    <form method="POST" action="flotaVehiculos.php">
        <button type="submit" name="btnGuardar">Guardar en Fichero</button>
        <button type="submit" name="btnRecuperar">Recuperar desde Fichero</button>
        <button type="submit" name="btnCerrarSesion">Cerrar Sesión</button>
    </form>

</body>

</html>