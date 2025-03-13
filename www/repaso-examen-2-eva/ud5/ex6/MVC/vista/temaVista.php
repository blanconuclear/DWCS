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

            echo "
                <div class='container'>
                    <img src='../../imaxes/$imaxe'>
                    <p>$autor</p>
                    <p>$titulo</p>
                    <p>$ano</p>
                    <p>$duracion</p>
                    <form action='temaControlador.php' method='post'>
                        <button name='btnBorrar' type='submit' value='" . urlencode($titulo) . "'>Borrar</button>
                    </form>
                
                    <form action='' method='post'>
                        <button name='btnEditarForm' value='" . urlencode($titulo) . "'>Editar</button>
                    </form>
                </div>
            ";
        }
    }

    function formBuscarPorTitulo()
    {
        echo "
            <form action='temaControlador.php' method='post'>
                        <input type='text' name='buscarPorTitulo' placeholder='buscar por título'>
                        <button name='btnBuscarPorTitulo'>Buscar por titulo</button>
                    </form>
        ";
    }

    function formCrearTema()
    {
        echo '
        <h2>Crear tema</h2>
        <form action="temaControlador.php" method="post">
            <input type="text" name="crearTitulo" placeholder="Titulo" />
            <br>
            <input type="text" name="crearAutor" placeholder="Autor" />
              <br>
            <input type="number" name="crearAno" placeholder="Ano" />
              <br>
            <input type="number" name="crearDuracion" placeholder="Duracion" />
              <br>
            <input type="text" name="crearImaxe" placeholder="Imaxe" />
              <br>
            <button name="btnCrearTema" type="submit">Crear Tema</button>
        </form>
        ';
    }

    if (isset($_POST['btnEditarForm'])) {
        $tituloParaEditar = $_POST['btnEditarForm'];
        echo "
   <h2>Editar tema</h2>
<form action='temaControlador.php' method='post'>
    <input type='text' name='editarTitulo' placeholder='Titulo' />
    <br>
    <input type='text' name='editarAutor' placeholder='Autor' />
      <br>
    <input type='number' name='editarAno' placeholder='Ano' />
      <br>
    <input type='number' name='editarDuracion' placeholder='Duracion' />
      <br>
    <input type='text' name='editarImaxe' placeholder='Imaxe' />
      <br>
    <button name='btnEditar' type='submit' value='$tituloParaEditar'>editar Tema</button>
</form>
        ";
    }
    ?>
</body>




</html>