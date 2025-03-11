<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h2>Registro de Usuario</h2>
    <form action="alta.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nome" required><br>

        <label>Contraseña:</label>
        <input type="password" name="pass" required><br>

        <label>Rol:</label>
        <select name="rol">
            <option value="usuario">Usuario</option>
            <option value="administrador">Administrador</option>
        </select><br>

        <button type="submit">Registrar</button>
    </form>
</body>

</html>