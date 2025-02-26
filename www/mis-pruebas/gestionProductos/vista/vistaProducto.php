<?php
function mostraFormularioCrear(): void
{
    echo "<h3>Crear Producto</h3>
        <form action='ProductoControlador.php' method='POST'>
            Nombre: <input type='text' name='nombre' required><br>
            Precio: <input type='number' step='0.01' name='precio' required><br>
            Stock: <input type='number' name='stock' required><br>
            <input type='submit' name='crear' value='Crear Producto'>
        </form>";
}

function mostraTaboaProductos($array): void
{
    echo "<table><tr><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acción</th></tr>";
    foreach ($array as $value) {
        echo "<tr>
                <td>{$value['nombre']}</td>
                <td>{$value['precio']}</td>
                <td>{$value['stock']}</td>
                <td>
                    <form method='post'>
                        <button type='submit' name='eliminar' value='{$value['id']}'>Eliminar</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
}
