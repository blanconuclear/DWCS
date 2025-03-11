<?php

declare(strict_types=1);

require_once 'conexion.php';
require_once 'Tema.php';

class TemaModelo extends Tema
{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }

    public static function mostrartodos(): array
    {
        $pdo = new Conexion();
        $sql = "SELECT * FROM tema";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function borrarPorTitulo(string $idTitulo): bool
    {
        $pdo = new Conexion();
        $sql = "DELETE FROM tema WHERE Titulo = :titulo";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':titulo' => $idTitulo
        ]);
    }

    public static function actualizarPorTitulo(
        string $idTitulo,
        string $tituloActualizado,
        string $autorActualizado,
        int $anoActualizado,
        int $duracionActualizado,
        string $imaxeActualizado
    ): bool {

        $pdo = new Conexion();
        $sql = "UPDATE tema SET Titulo=:titulo, Autor=:autor, Ano=:ano, Duracion=:duracion, Imaxe=:imaxe WHERE Titulo=:idtitulo";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':titulo' => $tituloActualizado,
            ':autor' => $autorActualizado,
            ':ano' => $anoActualizado,
            ':duracion' => $duracionActualizado,
            ':imaxe' => $imaxeActualizado,
            ':idtitulo' => $idTitulo
        ]);
    }
}
