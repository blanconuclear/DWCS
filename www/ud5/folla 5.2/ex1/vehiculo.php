<?php
class Vehiculo
{
    private string $matricula;
    private string $modelo;
    private float $kms;

    public function __construct(string $matricula, string $modelo, float $kms)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->kms = $kms;
    }

    public function getMatricula(): string
    {
        return $this->matricula;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getKms(): int
    {
        return $this->kms;
    }

    public function mostraEnTR(): string
    {
        return "<tr><td>{$this->matricula}</td><td>{$this->modelo}</td><td>{$this->kms}</td></tr>";
    }
}
