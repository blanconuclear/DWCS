<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            display: flex;
            flex-wrap: wrap;
        }

        .container {
            border: solid 1px;
            width: 200px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 5px;
        }

        img {
            width: 100px;
        }
    </style>
</head>

<body>

    <?php
    function mostrarDatosHTML($arrayTemas)
    {
        foreach ($arrayTemas as $tema) {
            $titulo = htmlspecialchars($tema['Titulo']);
            $autor = htmlspecialchars($tema['Autor']);
            $ano = htmlspecialchars($tema['Ano']);
            $duracion = htmlspecialchars($tema['Duracion']);
            $imaxe = htmlspecialchars($tema['Imaxe'] . ".jpg");


            echo "   <div class='container'>
                        <img src='../..//imaxes/$imaxe'>
                        <p>$autor</p>
                        <p>$titulo</p>
                        <p>$ano</p>
                        <p>$duracion</p>
                        <form action='temaControlador.php' method='post'>
                             <button name='btnBorrar' type='submit' value='" . urlencode($titulo) . "'>Borrar</button>
                        </form>
                    </div>";
        }
    }

    function buscarPortitulo()
    {
        echo '
            <form action="temaControlador.php" method="post">
        <input type="text" name="buscarPorTitulo" placeholder="buscar por titulo">
        <button name="btnBuscarPorTitulo" type="submit">Buscar por titulo</button>
    </form>
        ';
    }

    function crearTitulo()
    {
        echo '    <form action="temaControlador.php" method="post">
        <input type="text" name="crearTitulo" placeholder="Titulo">
        <input type="text" name="crearAutor" placeholder="autor">
        <input type="number" name="crearAno" placeholder="ano">
        <input type="number" name="crearDuracion" placeholder="duracion">
        <input type="text" name="crearImaxe" placeholder="imaxe">
        <button name="btnCrear" type="submit">Crear titulo</button>
    </form>';
    }

    ?>



</body>

</html>