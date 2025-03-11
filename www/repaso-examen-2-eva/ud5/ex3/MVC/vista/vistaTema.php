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
               <img src='../../../cosas-necesarias/para 5.5-20250310/imaxes/$srcImaxe'>
               <p>$titulo</p>
               <p>$ano</p>
               <p>$duracion</p>
               <p>$autor</p>
               <form action='temaControlador.php' method='post'>
                    <button type='submit' name='btnBorrar' value='$titulo'>Borrar</button>
               </form>
            ";
        }
    }

    function buscarPorTitulo()
    {
        echo "
        <form action='temaControlador.php' method='post'>
            <input type='text' name='tituloParaBuscar' placeholder='titulo para buscar'>
            <button type='submit' name='btnBuscarPorTitulo'>Buscar por titulo</button>
        </form>
        ";
    }

    ?>

</body>

</html>