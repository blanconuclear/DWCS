<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container{
            width: 200px;
            border: solid black 1px;
            border-radius: 10px;
            margin: 10px;
        }

        img{
            width: 100px;
        }
    </style>
</head>
<body>
<?php
function artigosTodosVista($arrayArtigos){
    foreach ($arrayArtigos as $artigo) {
       $nome=htmlspecialchars($artigo["nomeArtigo"]);
       $prezo=htmlspecialchars($artigo["prezo"]);
       $imaxe=htmlspecialchars($artigo["imaxe"]);

       echo "<div class='container'>
                <img src='../imaxes/$imaxe' >
                <p>$nome</p>
                <p>$prezo €</p>
    
            </div>";


    }
}

function formularioVista(){
    echo '
    <form action="artigoControlador.php" method="post">
    <button name="btnMostrarTodo">mostrar todos</button>
    <button name="btnSeleccionarPorNome">selectionar por nome</button>
</form>
    ';

}

function formUnArtigo(){
    echo '
        <form action="artigoControlador.php" method="post">
            <input type="text" name="nomeArtigo" placeholder="Nome artigo">
            <button type="submit" name="btnBuscarUnArtigo">buscar un artigo polo nome</button>
        </form>
    ';
}

function artigoUnVista($arrayArtigos){
    foreach ($arrayArtigos as $artigo) {
       $nome=htmlspecialchars($artigo["nomeArtigo"]);
       $prezo=htmlspecialchars($artigo["prezo"]);
       $imaxe=htmlspecialchars($artigo["imaxe"]);

       echo "<div class='container'>
                <img src='../imaxes/$imaxe' >
                <p>$nome</p>
                <p>$prezo €</p>
            </div>";

    
        
    }
}

?> 



</body>
</html>