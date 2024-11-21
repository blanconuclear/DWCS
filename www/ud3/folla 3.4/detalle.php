<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        ul li span {
            font-weight: 400;
            color: #555;
        }

        /* Estilo del botón */
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        button a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        require_once 'conexion.php';

        if (isset($_GET['btn_detalle'])) {
            $id = $_GET['btn_detalle'];

            // Consulta a la base de datos
            $consulta = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
            $consulta->bind_param("i", $id); // Protección contra inyección SQL
            $consulta->execute();
            $resultado = $consulta->get_result();

            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila['id'];
                $nombre = $fila['nombre'];
                $nombreCorto = $fila['nombre_corto'];
                $descripcion = $fila['descripcion'];
                $pvp = $fila['pvp'];
                $familia = $fila['familia'];

                // Generar la lista de detalles
                echo "<ul>";
                echo "<li>ID: <span>" . $id . "</span></li>";
                echo "<li>Nombre: <span>" . $nombre . "</span></li>";
                echo "<li>Nombre Corto: <span>" . $nombreCorto . "</span></li>";
                echo "<li>Descripción: <span>" . $descripcion . "</span></li>";
                echo "<li>PVP: <span>$" . $pvp . "</span></li>";
                echo "<li>Familia: <span>" . $familia . "</span></li>";
                echo "</ul>";
            }
        }
        ?>
    </div>
    <button><a href="inicio.php">Inicio</a></button>
</body>

</html>