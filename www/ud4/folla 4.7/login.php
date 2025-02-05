<?php
session_start();
?>
<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Login</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="validalogin.php" method="post">
                    <div class="mb-3">
                        <label for="nomeUsuario" class="form-label">Nome de usuario:</label>
                        <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasinal" class="form-label">Contrasinal:</label>
                        <input type="password" class="form-control" id="contrasinal" name="contrasinal" required>
                    </div>
                    <div class="mb-3">
                        <label for="idioma" class="form-label">Idioma:</label>
                        <select class="form-select" id="idioma" name="idioma" required>
                            <option value="gl">Galego</option>
                            <option value="es">Español</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <a href="rexistro.html">Rexistrarse</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>