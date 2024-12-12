<?php
include_once 'config.php';

//

//eliminar
if(isset($_GET['btn_eliminar'])){
$nomeEliminar =$_GET['selectEliminar'];

$sql="DELETE FROM naves WHERE nome = :nome";
$stmt=$pdo->prepare($sql);
$stmt->execute([':nome'=>$nomeEliminar]);
}



//ALUGADO
if(isset($_GET['btn_selectNome'])){
    $selectNome=$_GET['selectNome'];

    $sql = "UPDATE naves SET alugado = 'si' WHERE nome = :nome";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':nome'=>$selectNome]);   
    
    echo "Nave alugada correctamente";
}


//cambiar prezo
if(isset($_GET['btn_selectNomeCambiarPrezo'])){
    $selectNome=$_GET['selectNomeCambiarPrezo'];
    $novoPrezo=$_GET['novoPrezo'];

   
 

    $sql = "UPDATE naves SET prezo = :prezo WHERE nome = :nome";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':prezo'=>$novoPrezo,
                            ':nome'=>$selectNome]);   
    
    echo "Nave alugada correctamente";
}

//mostrar todo
if(isset($_GET['mostrar_todo'])){
    $sql = "SELECT * FROM naves";
    $stmt=$pdo->query($sql);    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img{
            width: 100px;
        }
    </style>
</head>
<body>
    
<!--Mostrar datos-->
<table border="1px">
    <tr>
    <th>Nome</th>
    <th>Prezo</th>
    <th>Alugado</th>
    <th>Imaxe</th>
    <th>cambiar Prezo</th>
    </tr>
    <?php

    if(!empty($stmt)){
    while ($fila = $stmt ->fetch(PDO::FETCH_ASSOC)) {   
    $nome=$fila['nome'];
    $prezo=$fila['prezo'];
    $alugado = $fila['alugado'];
    $imaxe = $fila['nomeImaxe'];
  
    echo "
    <tr>
    <td>$nome</td>
    <td>$prezo</td>
    <td>$alugado</td>
    <td><img src='imaxes/$imaxe'></td>
    </tr>";
    
  }}
?>
</table>

<a href="intro.php">volver</a>






</body>
</html>