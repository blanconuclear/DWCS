<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            $srcImaxe = htmlspecialchars($tema['Imaxe']) . ".jpg";

            echo "<article id='contenedor'>
            <div class='tema'>
                <img src='../../imaxes/$srcImaxe' alt='$titulo'><br>
                <div>$titulo</div>
                <div>$autor</div>
                <div>$ano</div>
                <div>$duracion segundos</div>
            </div>
            <form action='TemaControlador.php' method='post'>
                <button type='submit' name='btnEliminar' value='$titulo'>Borrar</button>
                <button type='submit' name='btnActualizar' value='$titulo'>Actualizar</button>
            </form>
        </article>";
        }
    }


    function formActualizar()
    {
        $idTitulo = $_POST['btnActualizar'];
        echo '
            <h1>Actualizar por título</h1>
            <form action="temaControlador.php" method="post">
                <input type="text" name="actualizarTitulo" placeholder="Titulo"><br>
                <input type="text" name="actualizarAutor" placeholder="Autor"><br>
                <input type="number" name="actualizarAno" placeholder="Ano"><br>
                <input type="number" name="actualizarDuracion" placeholder="Duración"><br>
                <input type="text" name="actualizarImaxe" placeholder="Imaxe"><br>
                <button type="submit" name="btnActualizarFinal" value="' . $idTitulo . '">Actualizar</button>
            </form>';
    }

    function buscarPorTitulo()
    {
        echo '
        <h1>Buscar por título</h1>
        <form action="temaControlador.php" method="post">
            <input type="text" name="buscarTitulo" placeholder="Buscar por Titulo"><br>
          
            <button type="submit" name="btnBuscarPorTitulo">Buscar por título</button>
        </form>';
    }

    ?>
</body>

</html>