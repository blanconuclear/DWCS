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
        <select name="rol">
            <option value="usuario">usuario</option>
            <option value="administrador">administrador</option>
        </select>
        <button name="btnRexistro">Enviar</button>
    </form>
    <a href="login.php">Login</a>
</body>

</html>