<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>

<body>
    <h2>Iniciar Sesión</h2>
    <form action="comprobacredenciais.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nome" required><br>

        <label>Contraseña:</label>
        <input type="password" name="pass" required><br>

        <label>Idioma:</label>
        <select name="SelectIdioma">
            <option value="galego">Galego</option>
            <option value="castellano">Castellano</option>
            <option value="english">English</option>
        </select><br>

        <button type="submit">Entrar</button>
    </form>
    <a href="rexistro.html">Registrarse</a>
</body>

</html>