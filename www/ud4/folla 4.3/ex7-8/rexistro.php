<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Rexistro</title>
</head>

<body>
    <h1>Formulario de Rexistro</h1>
    <form action="garda.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="passwd">Contrasinal:</label>
        <input type="password" id="passwd" name="passwd" required><br><br>

        <button type="submit">Rexistrar</button>
    </form>
</body>

</html>