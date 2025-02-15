<?php
class Empregado
{
    public $nome;
    public $salario;
    public static $numEmpregados = 0;

    public function __construct($nome, $salario)
    {
        $this->nome = $nome;

        if ($salario > 2000) {
            $this->salario = 2000; // Se supera 2000€, poñemos 2000€
        } else {
            $this->salario = $salario;
        }

        self::$numEmpregados++; // Sumamos 1 empregado máis
    }

    public function getSalario()
    {
        return $this->salario;
    }
}

class Operario extends Empregado
{
    public $turno;

    public function __construct($nome, $salario, $turno)
    {
        parent::__construct($nome, $salario); // Chamamos ao constructor de Empregado

        if ($turno == "diurno" || $turno == "nocturno") {
            $this->turno = $turno;
        } else {
            $this->turno = "non especificado"; // Se non é correcto, poñemos por defecto
        }
    }
}

// Crear empregados e operarios
$miguel = new Empregado("Miguel", 2500); // Salario limitase a 2000€
$ana = new Empregado("Ana", 1800);
$pedro = new Operario("Pedro", 1900, "diurno");

// Amosar información
echo "Empregados creados: " . Empregado::$numEmpregados . "<br>";
echo "Miguel ten un salario de " . $miguel->getSalario() . "€<br>";
echo "Ana ten un salario de " . $ana->getSalario() . "€<br>";
echo "Pedro traballa no turno " . $pedro->turno . " e gaña " . $pedro->getSalario() . "€<br>";
