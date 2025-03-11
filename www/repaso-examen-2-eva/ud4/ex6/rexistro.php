<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="alta.php" method="post">
        <input type="text" name="nome" placeholder="nome">
        <input type="password" name="pass" placeholder="pass">
        <select name="selectRol">
            <option value="usuario">usuario</option>
            <option value="administrador">administrador</option>
        </select>

        <button type="submit">Enviar</button>
    </form>
    <a href="login.php">login</a>
</body>

</html>