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
            
            </form>";
    }
    function mostraTaboaCliente($array): void
    {
        echo "<table><tr><th>Nome</th><th>Apelidos</th><th>email</th></tr>";
        foreach ($array as $value)
            echo "<td>{$value['nome']}</td>
                  <td>{$value['apelidos']}</td> 
                  <td>{$value['email']}</td>
                  <td>
                    <form method='post'>
                          <button type='submit' name='eliminar' value='{$value['email']}'>Eliminar</button>
                          <button type='submit' name='editar' value='{$value['email']}'>Editar</button>
                    </form>
                  </td>                  
                </tr>";

        echo "</table>";
    }

    function mostraFormularioCrear(): void
    {
        echo "<h3>Crear Novo Cliente</h3>
        <form action='ClienteControlador.php' method='POST'>
            Nome: <input type='text' name='nome' required><br>
            Apelidos: <input type='text' name='apelidos' required><br>
            Email: <input type='email' name='email' required><br>
            <input type='submit' name='crear' value='Crear Cliente'>
        </form>";
    }

    if (isset($_POST['editar'])) {
        $email = $_POST['editar'];



        echo "<h3>Editar Cliente</h3>
            <form action='ClienteControlador.php' method='POST'>
                <input type='text' name='novoNome'>
                <input type='text' name='novosApelidos' >
                <input type='text' name='novoEmail' >
             
                <button type='submit' name='editarFinal' value='{$email}'>Editar</button>

            </form>";
    }


    /* O RESTO DAS FUNCIÓNS PARA MOSTRAR NA PÁXINA  */

    ?>
</body>

</html>