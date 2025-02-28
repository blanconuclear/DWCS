<?php

class Tema
{
    protected string $titulo;
    protected string $autor;
    protected int $ano;
    protected int $duracion;
    protected string $imaxe;

    public function __construct(
        string $titulo,
        string $autor,
        int $ano,
        int $duracion,
        string $imaxe
    ) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->duracion = $duracion;
        $this->imaxe = $imaxe;
    }

    public function mostra(): void
    {
        echo "<p><strong>Título:</strong> {$this->titulo}</p>";
        echo "<p><strong>Autor:</strong> {$this->autor}</p>";
        echo "<p><strong>Ano:</strong> {$this->ano}</p>";
        echo "<p><strong>Duración:</strong> {$this->duracion} minutos</p>";
        echo "<p><strong>Imagen:</strong><br> <img src='{$this->imaxe}' alt='{$this->titulo}' width='200'></p>";
    }
}
