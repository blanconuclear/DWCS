<?php
$host = "dbXdebug";
$user = "UsuarioBorrarPrueba";
$pass = "abc123";
$dbName = "senderismo";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
} catch (Exception $e) {
    echo "Error en la conexion: " . $e->getMessage();
}

//Eliminar producto
if (isset($_POST['btn_eliminar'])) {
    $nomeElimiar = $_POST['btn_eliminar'];

    $sql = "DELETE FROM material WHERE Nome LIKE :nome ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => "%$nomeElimiar%"]);
}

//Editar
if (isset($_POST['btn_editar'])) {
    $nomeEditar = $_POST['btn_editar'];

    echo "<form method='post'>
  <label for='nome_editato'>Nome:</label>
  <input type='text' name='nome_editato' />
  <label for='marca_editato'>Marca:</label>
  <input type='text' name='marca_editato' />
  <label for='tipo_editato'>Tipo:</label>
  <input type='text' name='tipo_editato' />
  <label for='prezo_editato'>Prezo:</label>
  <input type='text' name='prezo_editato' />
  <button name='btn_editar_enviar' value='$nomeEditar'>Enviar</button>
</form>";
}

//Consulta editar
if (isset($_POST['btn_editar_enviar'])) {
    $nomeEditar = $_POST['btn_editar_enviar'];
    $nome_editato = $_POST['nome_editato'];
    $marca_editato = $_POST['marca_editato'];
    $tipo_editato = $_POST['tipo_editato'];
    $prezo_editato = $_POST['prezo_editato'];

    $sql = "UPDATE material SET Nome = :nome,Marca = :marca,Tipo = :tipo,Prezo = :prezo WHERE Nome LIKE :nomeEditar";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => $nome_editato, ':marca' => $marca_editato, ':tipo' => $tipo_editato, ':prezo' => $prezo_editato, ':nomeEditar' => "%$nomeEditar%"]);
}


//Listar todo
if (isset($_GET['listar_todo'])) {
    $sql = "SELECT * FROM material";
    $stmt = $pdo->query($sql);
}

//Listar por marca
if (isset($_GET['ordenar_marca'])) {
    $sql = "SELECT * FROM material ORDER BY Marca";
    $stmt = $pdo->query($sql);
}

//Listar por precio
if (isset($_GET['ordenar_prezo'])) {
    $sql = "SELECT * FROM material ORDER BY Prezo";
    $stmt = $pdo->query($sql);
}

//Buscar por unha marca
if (isset($_GET['btn_buscar_marca'])) {
    $buscarMarca = $_GET['buscar_marca'];

    $sql = "SELECT * FROM material WHERE Marca LIKE :marca";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':marca' => "%$buscarMarca%"]);
}


//Buscar por calquera campo da base de datos
if (isset($_GET['btn_buscar_calquer_campo'])) {
    $calquerCampo = $_GET['buscar_calquer_campo'];

    $sql = "SELECT * FROM material WHERE Nome LIKE :nome OR 
    Marca LIKE :marca OR Tipo LIKE :tipo OR Prezo LIKE :prezo ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => "%$calquerCampo",
        ':marca' => "%$calquerCampo%",
        ':tipo' => "%$calquerCampo%",
        ':prezo' => "%$calquerCampo%"
    ]);
}

//Lista polo tipo de produto
if (isset($_GET['btn_selectTipo'])) {
    $selectTipo = $_GET['selectTipo'];

    $sql = "SELECT * FROM material WHERE Tipo LIKE :tipo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':tipo' => "%$selectTipo%"]);
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
        <div> $nome  </div>
        <div>  $marca  </div>
        <div>  $tipo  </div>
        <div>  $prezo  €  </div>
        <form method='post'>
            <button name='btn_eliminar' value='$nome'>Eliminar</button>
            <button name='btn_editar' value='$nome'>Editar</button>
        </form>
        </div>";
        }




        /* DENTRO DUN BUCLE E DESPOIS DE LER AS VARIABLES DA BASE DE DATOS:
        
        echo "<div class='produto'><img src='imaxes/$srcImaxe'>....
        </div>";
        
        */




        ?>

        <article>
            <a href="intro.php">Volver</a>

</body>

</html>