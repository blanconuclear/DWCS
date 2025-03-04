<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #contenedor {
            width: 30%;
            margin: 20px auto;
            background-color: white;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 5px;
        }

        .tema {
            height: 210px;
            background-color: white;
            border: 1px black solid;
            text-align: center;
            padding-top: 20px;
            font-family: Arial;
        }

        img {
            width: 130px;
            height: 130px;
        }
    </style>
</head>

<body>
    <?php
    function mostrarDatosHTML($arrayTemas): void
    {
        if (!empty($arrayTemas)) {
            foreach ($arrayTemas as $tema) {
                $titulo = $tema['Titulo'];
                $srcImaxe = $tema['Imaxe'] . ".jpg";

                echo "<article id='contenedor'>
                    <div class='tema'>
                        <img src='imaxes/$srcImaxe'><br>
                        <div>{$tema['Titulo']}</div>
                        <div>{$tema['Autor']}</div>
                        <div>{$tema['Duracion']}</div>
                        <div>{$tema['Ano']}</div>
                        <div>
                        <form action='temaControlador.php'>
                            <button name='btnBorrar' value='$titulo' >Delete</button>
                        </form>
                        </div>
                    </div>
                </article>";
            }
        }
    }


    function buscarPorTitulo()
    {
        echo "  <form action='temaControlador.php'>
      <input type='text' placeholder='buscar por titulo' name='tituloParaBuscar' />
      <button name='btnBuscarPorTitulo'>Buscar por titlo</button>
    </form>";
    }

    function formInsertarTema()
    {
        echo '
        <h1>Agregar tema</h1>
        <form action="temaControlador.php" method="post">
            <input type="text" name="novoTitulo" placeholder="Titulo"><br>
            <input type="text" name="novoAutor" placeholder="Autor"><br>
            <input type="number" name="novoAno" placeholder="Ano"><br>
            <input type="number" name="novoDuracion" placeholder="Duración"><br>
            <button type="submit" name="btnInsertar">Insertar</button>
        </form>';
    }
    ?>
</body>

</html>