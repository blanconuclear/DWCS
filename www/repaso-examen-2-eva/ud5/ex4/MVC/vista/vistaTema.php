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
            width: 400px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
            $imaxe = htmlspecialchars($tema['Imaxe']) . ".jpg";

            echo "
            <div class='container'>
                <img src='../../imaxes/$imaxe' alt='Imagen de $titulo'>
                <p>$titulo</p>
                <p>$autor</p>
                <p>$ano</p>
                <p>$duracion</p>
                <form action='temacontrolador.php' method='post'>
                    <button name='btnBorrar' value='$titulo'>Borrar</button>
                    </form>
                  <form action='' method='post'>
                    <button name='btnEditar' value='$titulo'>Editar</button>
                </form>
            </div>
        ";
        }
    }

    function buscarPorTitulo()
    {
        echo '<form action="temacontrolador.php" method="post">
        <input type="text" name="tituloParaBuscar" placeholder="titulo para buscar">
        <button name="btnBuscarPorTitulo">Buscar por Titulo</button>
    </form>';
    }

    function formEditar() {}

    if (isset($_POST['btnEditar'])) {

        $tituloParaEditar = $_POST['btnEditar'];

        echo  "
            <form action='temacontrolador.php' method='post'>
                <input type='text' placeholder='titulo a editar' name='tituloAeditar'>
                <input type='text' placeholder='autor a editar' name='autorAeditar'>
                <input type='number' placeholder='ano a editar' name='anoAeditar'>
                <input type='number' placeholder='duracion a editar' name='duracionAeditar'>
                <input type='text' placeholder='imaxe a editar' name='imaxeAeditar'>
                <button name='btnEditarFinal' value='$tituloParaEditar'>Enviar edicion</button>
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
    ?>






</body>

</html>