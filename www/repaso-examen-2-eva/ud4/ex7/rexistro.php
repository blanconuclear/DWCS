<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="alta.php" method="post">
        <input type="text" placeholder="nome" name="nome">
        <input type="password" placeholder="pass" name="pass">
        <select name="selectRol">
            <option value="usuario">usuario</option>
            <option value="administrador">administrador</option>
        </select>
        <button type="submit" name="btnRexistro">Enviar</button>
    </form>

    <a href="login.php">Ir a login</a>
</body>

</html>