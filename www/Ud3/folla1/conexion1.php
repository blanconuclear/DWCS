<!DOCTYPE html>
<html>

<head>
    <title>Conexión a bases de datos</title>
    <meta charset=”UTF8”>
</head>

<body>
    <?php
    //$conexion=mysqli_connect("localhost","usuario","Password", "proba"); //Co xampp
    $conexion = mysqli_connect("dbXdebug", "root", "root", "folla1"); //Co docker de
    // clase
    if ($conexion) {
        mysqli_set_charset($conexion, "utf8");
        $resultado = mysqli_query($conexion, "SELECT id,DNI,Nome,Apelidos,Idade from xogador");
        if ($resultado != FALSE) {
            while ($fila = mysqli_fetch_array($resultado))
                echo $fila["id"], " ", $fila["DNI"], " ", $fila["Nome"], " ", $fila["Apelidos"], " ", $fila["Idame"], "<br>";
        }
    } else {
        echo "Fallou a conexión coa base de datos";
    }
    mysqli_close($conexion); // Pechamos a conexion.
    ?>
</body>

</html>