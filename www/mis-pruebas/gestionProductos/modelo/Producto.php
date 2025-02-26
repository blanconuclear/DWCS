<?php
class Producto
{
    protected string $nombre;
    protected float $precio;
    protected int $stock;
    const TABLA = 'productos';

    public function __construct(string $nombre, float $precio, int $stock)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function mostrar(): void
    {
        echo "Producto: {$this->nombre}, Precio: {$this->precio}, Stock: {$this->stock} <br>";
    }
}
