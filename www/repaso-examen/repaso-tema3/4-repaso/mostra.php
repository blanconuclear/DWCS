<?php
include_once 'conexion.php';

if (isset($_POST['btn_eliminar'])) {
    $borrarNome = $_POST['btn_eliminar'];

    $sql = "DELETE FROM material WHERE Nome LIKE :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => "%$borrarNome%"]);
}

if (isset($_POST['btn_editar'])) {
    $nomeCoincidente = $_POST['btn_editar'];

    echo "<form method='post'>
      <label for='editar_nome'>Nome:</label>
      <input type='text' name='editar_nome' />
      <label for='editar_marca'>Marca:</label>
      <input type='text' name='editar_marca' />
      <label for='editar_tipo'>Tipo:</label>
      <input type='text' name='editar_tipo' />
      <label for='editar_prezo'>Prezo:</label>
      <input type='text' name='editar_prezo' />
      <label for='editar_imaxe'>Imaxe:</label>
      <input type='text' name='editar_imaxe' />

      <button name='btn_enviar_editar' value='$nomeCoincidente'>Enviar</button>
    </form>";
}

if (isset($_POST['btn_enviar_editar'])) {
    $nomeBtn = $_POST['btn_enviar_editar'];

    $editar_nome = $_POST['editar_nome'];
    $editar_marca = $_POST['editar_marca'];
    $editar_tipo = $_POST['editar_tipo'];
    $editar_prezo = (int) $_POST['editar_prezo'];
    $editar_imaxe = $_POST['editar_imaxe'] . ".jpg";

    $sql = "UPDATE material SET Nome = :nome,
                                Marca= :marca,
                                Tipo =:tipo,
                                Prezo=:prezo,
                                Imaxe=:imaxe
                            WHERE Nome LIKE :nomeEditar";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => "$editar_nome",
        ':marca' => "$editar_marca",
        ':tipo' => "$editar_tipo",
        ':prezo' => "$editar_prezo",
        ':imaxe' => "$editar_imaxe",
        ':nomeEditar' => "%$nomeBtn%"
    ]);
}

if (isset($_GET['listar_todo'])) {
    $sql = "SELECT * FROM material";
    $stmt = $pdo->query($sql);
}

if (isset($_GET['ordenar_marca'])) {
    $sql = "SELECT * FROM material ORDER BY Marca";
    $stmt = $pdo->query($sql);
}

if (isset($_GET['ordenar_prezo'])) {
    $sql = "SELECT * FROM material ORDER BY Prezo";
    $stmt = $pdo->query($sql);
}


//FIJARSE EN ESTE EJEMPLO!!!!
if (isset($_GET['btn_buscar_marca'])) {
    $marcaBuscar = $_GET['buscar_marca'];

    if (!empty($marcaBuscar)) {
        $sql = "SELECT * FROM material WHERE Marca LIKE :marca";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':marca' => "%$marcaBuscar%"]);
    } else {
        echo "introduce unha marca correcta";
        echo "<a href='intro.php'>Volver</a>";
        return;
    }
}

if (isset($_GET['btn_buscar_calquer_campo'])) {
    $buscarCampo = $_GET['buscar_calquer_campo'];

    $sql = "SELECT * FROM material WHERE Nome LIKE :nome OR Marca LIKE :marca OR Tipo LIKE :tipo OR Prezo LIKE :prezo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => "%$buscarCampo%",
        ':marca' => "%$buscarCampo%",
        ':tipo' => "%$buscarCampo%",
        ':prezo' => "%$buscarCampo%"
    ]);
}

if (isset($_GET['btn_selectTipo'])) {
    $tipoSelect = $_GET['selectTipo'];

    $sql = "SELECT * FROM material WHERE Tipo LIKE :tipo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':tipo' => "%$tipoSelect%"]);
}



?>

<!DOCTYPE html>
<html>

<head>
    <style>
        #contenedor {
            width: 70%;
            margin: 20px auto;
            background-color: white;

            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 5px;


        }

        .produto {
            /* width:200px; */
            height: auto;
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


    <meta charset="utf-8" />
    <title></title>
</head>

<body>
    <article id="contenedor">
        <?php

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nome = $fila['Nome'];
            $marca = $fila['Marca'];
            $tipo = $fila['Tipo'];
            $prezo = $fila['Prezo'];
            $imaxe = $fila['Imaxe'];

            echo "<div class='produto'>
            <img src='imaxes/$imaxe'>
            <div>$nome</div>
            <div>$marca</div>
            <div>$tipo</div>
            <div>$prezo</div>
            <form method='post'>
                <button value='$nome' name='btn_eliminar'>Eliminar</button>
                <button value='$nome' name='btn_editar'>Editar</button>
            </form>
        </div>";
        }


        ?>

        <article>

            <button><a href="intro.php">Volver</a></button>



</body>

</html>