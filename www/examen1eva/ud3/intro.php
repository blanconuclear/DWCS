<?php
include_once 'config.php';

//form crear producot
if(isset($_GET['btn_crear_producto'])){
    echo "<form method='get'>
        <label for='novo_nome'>Nome: </label>
        <input type='text' name='novo_nome'>

        <label for='novo_prezo'>Prezo: </label>
        <input type='text' name='novo_prezo'>

        <label for='novo_alugado'>alugado: </label>
        <input type='text' name='novo_alugado'>

        <label for='novo_imaxe'>Imaxe: </label>
        <input type='text' name='novo_imaxe'>

        <button name='btn_enviar_novo_producto'>Enviar</button>
    </form>";
}

if (isset($_GET['btn_enviar_novo_producto'])) {
    $novo_nome=$_GET['novo_nome'];
    $novo_prezo= (int) $_GET['novo_prezo'];
    $novo_alugado=$_GET['novo_alugado'];
    $novo_imaxe=$_GET['novo_imaxe'].".jpg";
   

 $sql="INSERT INTO naves (nome,prezo,alugado,nomeImaxe)
              VALUES (:nome, :prezo, :alugado, :nomeImaxe)";


$stmt=$pdo->prepare($sql);
$stmt->execute([':nome'=>$novo_nome,
                        ':prezo'=>$novo_prezo,
                        ':alugado'=>$novo_alugado,
                        ':nomeImaxe'=>$novo_imaxe]);

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
    <form action="mostra.php" method="get" >
        <button name="mostrar_todo">Mostrar todo</button>

        <p>alugar nave: </p>
        <select name="selectNome" id="">
            <option value="" selected>Selecciona una nave</option>
         <?php
             $sql = "SELECT DISTINCT nome FROM naves WHERE alugado != 'si'";
             $stmt=$pdo->query($sql);

             while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nome = $fila['nome'];

                 echo "<option value='$nome'>$nome</option>";
             }
         ?>

        </select>
        <button name="btn_selectNome">Enviar</button>


        <p>Cambiar prezo: </p>
        <select name="selectNomeCambiarPrezo" id="">
            <option value="" selected>Selecciona una nave</option>
         <?php
             $sql = "SELECT DISTINCT nome FROM naves ";
             $stmt=$pdo->query($sql);

             while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nome = $fila['nome'];

                 echo "<option value='$nome'>$nome</option>";
             }
         ?>
        </select>
        <input type="text" name="novoPrezo" placeholder="cambiar prezo">
        <button name="btn_selectNomeCambiarPrezo">Enviar</button>

        <p>Eliminar: </p>
        <select name="selectEliminar" id="">
            <option value="" selected>Selecciona una nave para eliminar</option>
         <?php
             $sql = "SELECT DISTINCT nome FROM naves ";
             $stmt=$pdo->query($sql);

             while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nome = $fila['nome'];

                 echo "<option value='$nome'>$nome</option>";
             }
         ?>
        </select>
        <button name="btn_eliminar">Eliminar</button>


    </form>

    <form method="get">
    <button name="btn_crear_producto">Crear Producto</button>
    </form>


</body>


</html>

