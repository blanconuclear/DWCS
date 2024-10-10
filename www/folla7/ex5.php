<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados das Funcións</title>
</head>

<body>
    <h1>Resultados das Funcións</h1>

    <?php
    $primeiraCadea = $_POST['primeiraCadea'];
    $segundaCadea = $_POST['segundaCadea'];

    echo "<p><strong>Primeira Cadea:</strong> $primeiraCadea</p>";
    echo "<p><strong>Segunda Cadea:</strong> $segundaCadea</p>";

    if (isset($_POST['funcions'])) {
        $funcions = $_POST['funcions'];

        foreach ($funcions as $funcion) {
            switch ($funcion) {
                case "strcspn":
                    $resultado = strcspn($primeiraCadea, $segundaCadea);
                    echo "<p><strong>strcspn():</strong> O resultado é $resultado</p>";
                    break;

                case "strpos":
                    $resultado = strpos($primeiraCadea, $segundaCadea);
                    if ($resultado === false) {
                        echo "<p><strong>strpos():</strong> A segunda cadea non se atopa na primeira.</p>";
                    } else {
                        echo "<p><strong>strpos():</strong> A segunda cadea atópase en posición $resultado</p>";
                    }
                    break;

                case "strstr":
                    $resultado = strstr($primeiraCadea, $segundaCadea);
                    if ($resultado === false) {
                        echo "<p><strong>strstr():</strong> A segunda cadea non se atopa na primeira.</p>";
                    } else {
                        echo "<p><strong>strstr():</strong> O resultado é $resultado</p>";
                    }
                    break;

                case "substr":
                    $lonxitude = strlen($segundaCadea);
                    $resultado = substr($primeiraCadea, 0, $lonxitude);
                    echo "<p><strong>substr():</strong> O resultado da subcadea é $resultado</p>";
                    break;

                default:
                    echo "<p>Función non recoñecida.</p>";
                    break;
            }
        }
    } else {
        echo "<p>Non se seleccionou ningunha función.</p>";
    }
    ?>
</body>

</html>