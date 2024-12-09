<?php

//NOTAS


//prepare() y execute(): Úsalo cuando haya parámetros dinámicos 
//para evitar inyecciones SQL.


$servidor = "dbXdebug";
$usuario = "UsuarioBorrarPrueba";
$passwd = "abc123";
$base = "senderismo";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
} catch (Exception $e) {
    echo "Erro na conexión: " . $e->getMessage();
}

//Eliminar registro
if (isset($_POST['btn_eliminar'])) {
    $nome = $_POST['btn_eliminar'];

    $sql = "DELETE FROM material WHERE Nome LIKE :Nome";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':Nome' => $nome]);
}

//Listar todo
if (isset($_GET['listar_todo'])) {
    $query = $pdo->query("select * from material");
}
if (isset($_GET['listar_ordenados_marca'])) {
    $query = $pdo->query("SELECT * FROM material ORDER BY Marca");
}
if (isset($_GET['listar_ordenados_precio'])) {
    $query = $pdo->query("SELECT * FROM material ORDER BY Prezo");
}

if (isset($_GET['buscar_nombre_marca'])) {
    $marca = $_GET['nombre_marca'];
    $sql = "SELECT * FROM material WHERE Marca LIKE :Marca";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':Marca' => "%$marca%"]);

    $query = $stmt;
}

if (isset($_GET['buscar_calquer_campo'])) {
    $nombre = $_GET['nombre_calquer_campo'];

    $sql = "SELECT * FROM material WHERE Nome LIKE :Nome OR Marca LIKE :Marca OR Tipo LIKE :Tipo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':Nome' => "%$nombre%",
        ':Marca' => "%$nombre%",
        ':Tipo' => "%$nombre%"
    ]);

    $query = $stmt; // Asigna el resultado de $stmt para usarlo más adelante
}

if (isset($_GET['listar_tipo_producto'])) {
    $tipo = $_GET['selectTipo'];

    $sql = "select * from material where Tipo like :Tipo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':Tipo' => "%$tipo%"]);

    $query = $stmt;
}

if (isset($_POST['btn_editar'])) {
    // Recuperamos el valor del nombre original
    $nome_actual = $_POST['btn_editar'];

    echo "<form method='post'>
            <!-- Input Hidden para guardar el nombre original -->
            <input type='hidden' name='nome_actual' value='$nome_actual'>

            <label for='editar_nome'>Nome: </label>
            <input type='text' name='editar_nome' value='$nome_actual' required>

            <label for='editar_marca'>Marca: </label>
            <input type='text' name='editar_marca' required>

            <label for='editar_tipo'>Tipo: </label>
            <input type='text' name='editar_tipo' required>

            <label for='editar_prezo'>Prezo: </label>
            <input type='number' name='editar_prezo' required>

            <button type='submit' name='btn_insertar_editar'>Guardar Cambios</button>
          </form>";
}

if (isset($_POST['btn_insertar_editar'])) {
    // Recuperar valores del formulario
    $nome_actual = $_POST['nome_actual']; // Valor original del nombre
    $editar_nome = $_POST['editar_nome'];
    $editar_marca = $_POST['editar_marca'];
    $editar_tipo = $_POST['editar_tipo'];
    $editar_prezo = (int)$_POST['editar_prezo'];

    // Actualización del registro en la base de datos
    $sql = "UPDATE material 
            SET Nome = :Nome, Marca = :Marca, Tipo = :Tipo, Prezo = :Prezo 
            WHERE Nome = :Nome_actual";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':Nome' => $editar_nome,
        ':Marca' => $editar_marca,
        ':Tipo' => $editar_tipo,
        ':Prezo' => $editar_prezo,
        ':Nome_actual' => $nome_actual
    ]);

    echo "Producto actualizado correctamente.";
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


        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
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

            <form method="post">
                <label for="editar"></label>
            </form>
</body>

</html>