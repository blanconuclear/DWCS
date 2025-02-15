<?php

declare(strict_types=1);

class Bombilla
{
    private int $potencia;
    private static int $numBombillas = 0;

    // Constructor: Asigna potencia por defecto y aumenta el contador de bombillas
    public function __construct()
    {
        $this->potencia = 10;
        Bombilla::$numBombillas++;
    }

    // Método para obtener la potencia
    public function getPotencia(): int
    {
        return $this->potencia;
    }

    // Método para asignar potencia
    public function setPotencia(int $potencia)
    {
        $this->potencia = $potencia;
    }

    // Método para aumentar la potencia
    public function aumentaPotencia(int $val)
    {
        if ($this->potencia + $val > 35) {
            echo "Non se pode aumentar máis de 35W\n";
        } else {
            $this->potencia += $val;
        }
    }

    // Método para disminuir la potencia
    public function baixaPotencia(int $val)
    {
        if ($this->potencia - $val < 2) {
            echo "Non pode ser menor a 2W\n";
        } else {
            $this->potencia -= $val;
        }
    }

    // Método estático para obtener el número total de bombillas
    public static function getNumBombillas(): int
    {
        return Bombilla::$numBombillas;
    }

    // Destructor que actualiza el número de bombillas
    public function __destruct()
    {
        Bombilla::$numBombillas--;
        echo "Número de bombillas restantes: " . Bombilla::$numBombillas . "</br>";
    }
}

// Crear bombilla 1
$bombilla1 = new Bombilla();
$bombilla1->aumentaPotencia(20);
echo "A potencia da bombilla 1 é " . $bombilla1->getPotencia() . "W</br>";
echo "Número de bombillas: " . Bombilla::getNumBombillas() . "</br>";

// Crear bombilla 2
$bombilla2 = new Bombilla();
$bombilla2->aumentaPotencia(30);
echo "A potencia da bombilla 2 é " . $bombilla2->getPotencia() . "W</br>";

// Eliminar bombilla 1
unset($bombilla1);
echo "Número de bombillas despois de eliminar bombilla 1: " . Bombilla::getNumBombillas() . "</br>";

// Disminuir potencia de bombilla 2
$bombilla2->baixaPotencia(10);
echo "A potencia da bombilla 2 agora é " . $bombilla2->getPotencia() . "W</br>";

// Eliminar bombilla 2
unset($bombilla2);
echo "Número de bombillas despois de eliminar bombilla 2: " . Bombilla::getNumBombillas() . "</br>";
