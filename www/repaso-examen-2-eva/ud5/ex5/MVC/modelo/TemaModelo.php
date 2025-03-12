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


    public static function  mostrarTodos(): array
    {
        $pdo = new Conexion();

        $sql = "select * from " . self::TABLA;
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function borrarPorTitutlo($tituloParaBorrar): bool
    {
        $pdo = new Conexion();
        $sql = "delete from " . self::TABLA . " where Titulo = :titulo";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':titulo' => $tituloParaBorrar]);
    }

    public static function buscarPorTitulo($tituloParaBuscar): array
    {
        $pdo = new Conexion();

        $sql = "select * from " . self::TABLA . " where Titulo = :titulo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $tituloParaBuscar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function actualizarPorTitulo(
        $tituloActualizar,
        $tituloParaEditar,
        $autorActualizar,
        $anoActualizar,
        $duracionActualizar,
        $imaxeActualizar
    ): bool {
        $pdo = new Conexion();

        $sql = "UPDATE `tema` SET `Titulo`=:titulo,`Autor`=:autor,`Ano`=:ano,`Duracion`=:duracion,`Imaxe`=:imaxe WHERE Titulo=:tituloParaEditar";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':titulo' => $tituloActualizar,
            ':autor' => $autorActualizar,
            ':ano' => $anoActualizar,
            ':duracion' => $duracionActualizar,
            ':imaxe' => $imaxeActualizar,
            ':tituloParaEditar' => $tituloParaEditar,
        ]);
    }

    public function guardar(): bool
    {
        $pdo = new Conexion();
        $sql = "INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (:titulo,:autor,:ano,:duracion,:imaxe)";
        $stmt = $pdo->prepare($sql);
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':titulo' => $this->titulo,
            ':autor' => $this->autor,
            ':ano' => $this->ano,
            ':duracion' => $this->duracion,
            ':imaxe' => $this->imaxe
        ]);
    }
}
