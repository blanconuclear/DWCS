<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostra</title>
</head>

<body>
    <p>
        <?php
        $comentario = $_GET['comentario'];

        //con htmlspecialchars se imprime en pantalla
        echo htmlspecialchars($comentario);

        //Sin htmlspecialchars salta el alert
        echo $comentario;

        ?>
    </p>
</body>

</html>