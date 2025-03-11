<?php

declare(strict_types=1);
require_once 'Conexion.php';
require_once 'Tema.php';


class TemaModelo extends Tema
{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo,  $autor,  $ano,  $duracion,  $imaxe);
    }


    public static function mostrarTodos(): array
    {


        $pdo = new Conexion();
        $sql = "SELECT * FROM tema";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function borrarPorTitulo($tituloEliminar): bool
    {
        $pdo = new Conexion();

        $sql = "delete from tema where Titulo = :titulo";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['titulo' => $tituloEliminar]);
    }

    public static function buscarPorTitulo($tituloABuscar): array
    {
        $pdo = new Conexion();
        $sql = "SELECT * FROM tema where Titulo like :titulo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $tituloABuscar]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
