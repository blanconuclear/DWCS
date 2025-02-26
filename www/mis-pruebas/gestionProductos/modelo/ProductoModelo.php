<?php
require_once('conexion.php');
require_once('Producto.php');

mostraTaboaProductos($array);

class ProductoModelo extends Producto
{
    public function __construct(string $nombre, float $precio, int $stock)
    {
        parent::__construct($nombre, $precio, $stock);
    }

    public function guardar(): bool
    {
        $conexion = new Conexion();

        try {
            $stmt = $conexion->prepare("INSERT INTO " . self::TABLA . " (nombre,precio,stock) VALUES(:nombre,:precio,:stock)");
            return $stmt->execute([
                ':nombre' => $this->nombre,
                ':precio' => $this->precio,
                ':stock' => $this->stock
            ]);
        } catch (PDOException $e) {
            die("❌ Error al insertar producto: " . $e->getMessage());
        }
    }

    public static function obtenerTodos(): PDOStatement
    {
        $conexion = new Conexion();
        return $conexion->query("SELECT * FROM " . self::TABLA);
    }

    public static function borrarPorId(int $id): bool
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }
}
