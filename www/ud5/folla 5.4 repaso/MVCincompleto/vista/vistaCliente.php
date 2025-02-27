<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        td,
        th {
            border: solid 1px black;
        }

        table {
            border-collapse: collapse;
        }
    </style>


</head>

<body>

    <?php

    function mostraFormularioInicio(): void
    {
        echo "<form action='ClienteControlador.php' method='GET'>
                <input type='submit' name='todos' value='Mostrar todos'>
                <input type='submit' name='eliminar' value='eliminar'>
                <input type='submit' name='crear' value='Crear cliente'>
              </form>";
    }


    function mostraTaboaCliente($array): void
    {
        echo "<table>
        <tr>
        <th>Nome</th>
        <th>Apelidos</th>
        <th>email</th>
        </tr>";
        foreach ($array as $value)
            echo "<td>{$value['nome']}</td>
                  <td>{$value['apelidos']}</td>
                  <td>{$value['email']}</td>
                  <td>
                     <form method='POST' action='ClienteControlador.php'>
                        <button type='submit' name='btnEliminar' value='" . htmlspecialchars($value['email']) . "'>Eliminar</button>
                     </form>
                       <form method='POST'>
                        <button type='submit' name='editar' value='" . htmlspecialchars($value['email']) . "'>Editar</button>
                     </form>
                  </td>
                  </tr>";
        echo "</table>";
    }

    if (isset($_GET['crear'])) {
        echo "<h3>Crear Novo Cliente</h3>
        <form action='ClienteControlador.php' method='POST'>
            Nome: <input type='text' name='nome' required><br>
            Apelidos: <input type='text' name='apelidos' required><br>
            Email: <input type='email' name='email' required><br>
            <button type='submit' name='bntCrear'>Crear cliente</button>
        </form>";
    }

    if (isset($_POST['editar'])) {

        $emailParaEditar = $_POST['editar'];

        echo "<h3>Editar Cliente</h3>
        <form action='ClienteControlador.php' method='POST'>
            Nome: <input type='text' name='novoNome' required><br>
            Apelidos: <input type='text' name='novoApelidos' required><br>
            Email: <input type='email' name='novoEmail' required><br>
            <button type='submit' name='bntActualizar' value='" . htmlspecialchars($emailParaEditar) . ">Actualizar cliente</button>
        </form>";
    }


    ?>
</body>

</html>