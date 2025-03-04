<?php

declare(strict_types=1);

require_once 'Conexion.php';
require_once 'Tema.php';

class TemaModelo extends Tema
{
    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }

    public static function mostrarTodos(): array
    {
        $pdo = new Conexion();
        $query = $pdo->query("SELECT * FROM tema");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorTitulo(string $titulo): array
    {
        $pdo = new Conexion();
        $query = $pdo->prepare("SELECT * FROM tema WHERE Titulo LIKE ?");
        $query->execute(["%$titulo%"]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar(): string
    {
        $pdo = new Conexion();
        $query = $pdo->prepare("INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe]);
        return "Tema insertado correctamente.";
    }

    public  function eliminar(): bool
    {
        $pdo = new Conexion();
        $query = $pdo->prepare("DELETE FROM tema WHERE Titulo = ?");
        return $query->execute([$this->titulo]);
    }

    public function actualizar(string $tituloAnterior): string
    {
        $pdo = new Conexion();
        $query = $pdo->prepare("UPDATE tema SET Titulo = ?, Autor = ?, Ano = ?, Duracion = ?, Imaxe = ? WHERE Titulo = ?");
        $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe, $tituloAnterior]);
        return "Tema actualizado correctamente.";
    }
}
