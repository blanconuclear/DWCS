<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="comprobarCredenciais.php" method="post">
        <input type="text" placeholder="nome" name="nome">
        <input type="password" name="pass" placeholder="pass">
        <select name="selectIdioma">
            <option value="galego">galego</option>
            <option value="castellano">castellano</option>
            <option value="ingles">ingles</option>
        </select>

        <button name="btnLogin" type="submit">Enviar</button>
    </form>
    <a href="rexistro.php">Rexistro</a>
</body>

</html>