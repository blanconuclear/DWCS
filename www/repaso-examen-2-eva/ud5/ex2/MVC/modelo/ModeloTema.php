<?php

declare(strict_types=1);
require_once 'Conexion.php';
require_once 'Tema.php';

class ModeloTema extends Tema
{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }

    public static function mostrarTodos(): array
    {
        $pdo = new Conexion();

        $sql = "select * from tema";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function eliminarPorTitulo($tituloParaEliminar): bool
    {
        $pdo = new Conexion();

        $sql = "delete from tema where Titulo=:titulo";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':titulo' => $tituloParaEliminar]);
    }

    public static function mostrarPorTitulo($tituloParaBuscar): array
    {
        $pdo = new Conexion();
        $sql = "select * from tema where Titulo like :titulo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $tituloParaBuscar]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public  function gardarTema(): bool
    {
        $pdo = new Conexion();
        $sql = "INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (:titulo, :autor, :ano, :duracion, :imaxe)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':titulo' => $this->titulo,
            ':autor' => $this->autor,
            ':ano' => $this->ano,
            ':duracion' => $this->duracion,
            ':imaxe' => $this->imaxe
        ]);
    }

    public static function editarPorTitulo($tituloParaEditar, $tituloActualizado, $autorActualizado, $anoActualizado, $duracionActualizado, $imaxeActualizado): bool
    {
        $pdo = new Conexion();

        $sql = "UPDATE `tema` SET `Titulo`=:titulo,`Autor`=:autor,`Ano`=:ano,`Duracion`=:duracion,`Imaxe`=:imaxe WHERE Titulo = :tituloParaEditar";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':titulo' => $tituloActualizado,
            ':autor' => $autorActualizado,
            ':ano' => $anoActualizado,
            ':duracion' => $duracionActualizado,
            ':imaxe' => $imaxeActualizado,
            ':tituloParaEditar' => $tituloParaEditar
        ]);
    }
}
