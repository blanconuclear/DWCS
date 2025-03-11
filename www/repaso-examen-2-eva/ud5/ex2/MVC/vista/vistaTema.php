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
            $srcImaxe =  htmlspecialchars($tema['Imaxe']) . ".jpg";

            echo "
                <img src='../../imaxes/$srcImaxe' alt='Imagen de $titulo'>
                <p>$titulo</p>
                <p>$autor</p>
                <p>$ano</p>
                <p>$duracion</p>
                <form action='temaControlador.php' method='post'>
                    <button name='btnEliminar' value='$titulo'>Eliminar</button>
                </form>
                <form action='' method='post'>
                    <button name='btnEditar' value='$titulo'>Editar</button>
                </form>
              
            ";
        }
    }

    function forBuscarPortitulo()
    {
        echo " <form action='temaControlador.php' method='post'>
        <input type='text' placeholder='Buscar por titulo' name='tituloParaBuscar'>
        <button name='btnBuscarPortitulo'>Buscar por titulo</button>
    </form>
    ";
    }

    function formInsertar(): void
    {
        echo '
            <h1>Agregar tema</h1>
            <form action="temaControlador.php" method="post">
                <input type="text" name="txtTitulo" placeholder="Titulo"><br>
                <input type="text" name="txtAutor" placeholder="Autor"><br>
                <input type="number" name="txtAno" placeholder="Ano"><br>
                <input type="number" name="txtDuracion" placeholder="Duración"><br>
                <button type="submit" name="btnInsertar">Insertar</button>
            </form>';
    }

    function formActualizar($tituloParaEditar): void {}

    if (isset($_POST['btnEditar'])) {
        $tituloParaEditar = $_POST['btnEditar'];
        echo "
        <h1>Actualizar por título</h1>
        <form action='temaControlador.php' method='post'>
            <input type='text' name='actualizarTitulo' placeholder='Titulo'><br>
            <input type='text' name='actualizarAutor' placeholder='Autor'><br>
            <input type='number' name='actualizarAno' placeholder='Ano'><br>
            <input type='number' name='actualizarDuracion' placeholder='Duración'><br>
            <input type='text' name='actualizarImaxe' placeholder='Imaxe'><br>
            <button type='submit' name='btnActualizar' value='$tituloParaEditar'>Actualizar</button>
        </form>";
    }
    ?>
</body>



</html>