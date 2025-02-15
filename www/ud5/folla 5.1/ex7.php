<?php

declare(strict_types=1);

class Planeta
{
    public static int $numPlanetasAccesibles = 0;

    private string $nome;
    private float $tamano;
    private bool $accesible;
    private float $distanciaTerra;


    public function __construct(string $nome, float $tamano, bool $accesible, float $distanciaTerra)
    {

        $this->nome = $nome;
        $this->tamano = $tamano;
        $this->accesible = $accesible;
        $this->distanciaTerra = $distanciaTerra;

        self::$numPlanetasAccesibles++;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTamano()
    {
        return $this->tamano;
    }

    public function getAccesible()
    {
        return $this->accesible;
    }

    public function getDistanciaTerra()
    {
        return $this->distanciaTerra;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setTamano(float $tamano)
    {
        $this->tamano = $tamano;
    }

    public function setAccesible(bool $accesible)
    {
        $this->accesible = $accesible;
    }

    public function setDistanciaTerra(float $distanciaTerra)
    {
        $this->distanciaTerra = $distanciaTerra;
    }

    public function explotou()
    {
        $this->accesible = false;

        self::$numPlanetasAccesibles--;
    }
}

class PlanetaHabitable extends Planeta
{
    private float $numeroPersoas;
    private float $temperaturaMinima;
    private float $temperaturaMaxima;

    public function __construct(
        string $nome,
        float $tamano,
        bool $accesible,
        float $distanciaTerra,
        float $numeroPersoas,
        float $temperaturaMinima,
        float $temperaturaMaxima
    ) {
        parent::__construct($nome, $tamano, $accesible, $distanciaTerra);

        $this->numeroPersoas = $numeroPersoas;
        $this->temperaturaMinima = $temperaturaMinima;
        $this->temperaturaMaxima = $temperaturaMaxima;
    }

    // 📌 Getters para acceder a los valores
    public function getNumeroPersoas(): float
    {
        return $this->numeroPersoas;
    }

    public function getTemperaturaMinima(): float
    {
        return $this->temperaturaMinima;
    }

    public function getTemperaturaMaxima(): float
    {
        return $this->temperaturaMaxima;
    }

    // 📌 Setters para modificar los valores
    public function setNumeroPersoas(float $numeroPersoas): void
    {
        $this->numeroPersoas = $numeroPersoas;
    }

    public function setTemperaturaMinima(float $temperaturaMinima): void
    {
        $this->temperaturaMinima = $temperaturaMinima;
    }

    public function setTemperaturaMaxima(float $temperaturaMaxima): void
    {
        $this->temperaturaMaxima = $temperaturaMaxima;
    }

    // 📌 Método que lista todas las propiedades del planeta habitable
    public function listaTodo(): string
    {
        return "Nome: " . $this->getNome() . "\n" .
            "Tamaño: " . $this->getTamano() . " km\n" .
            "Accesible: " . ($this->getAccesible() ? "Si" : "Non") . "\n" .
            "Distancia á Terra: " . $this->getDistanciaTerra() . " km\n" .
            "Número de persoas: " . $this->numeroPersoas . "\n" .
            "Temperatura mínima: " . $this->temperaturaMinima . "°C\n" .
            "Temperatura máxima: " . $this->temperaturaMaxima . "°C\n";
    }
}

class PlanetaHostil extends Planeta
{
    private bool $haiVida;
    private bool $fontesDeEnerxia;

    public function __construct(
        string $nome,
        float $tamano,
        bool $accesible,
        float $distanciaTerra,
        bool $haiVida,
        bool $fontesDeEnerxia
    ) {
        // Llamar al constructor de la clase padre
        parent::__construct($nome, $tamano, $accesible, $distanciaTerra);

        // Inicializar los nuevos atributos
        $this->haiVida = $haiVida;
        $this->fontesDeEnerxia = $fontesDeEnerxia;
    }

    // 📌 Getters
    public function getHaiVida(): bool
    {
        return $this->haiVida;
    }

    public function getFontesDeEnerxia(): bool
    {
        return $this->fontesDeEnerxia;
    }

    // 📌 Setters
    public function setHaiVida(bool $haiVida): void
    {
        $this->haiVida = $haiVida;
    }

    public function setFontesDeEnerxia(bool $fontesDeEnerxia): void
    {
        $this->fontesDeEnerxia = $fontesDeEnerxia;
    }

    // 📌 Método que lista todas las propiedades del planeta
    public function listaTodo(): string
    {
        return "Nome: " . $this->getNome() . "\n" .
            "Tamaño: " . $this->getTamano() . " km\n" .
            "Accesible: " . ($this->getAccesible() ? "Si" : "Non") . "\n" .
            "Distancia á Terra: " . $this->getDistanciaTerra() . " km\n" .
            "Hai vida: " . ($this->haiVida ? "Si" : "Non") . "\n" .
            "Fontes de enerxía: " . ($this->fontesDeEnerxia ? "Si" : "Non") . "\n";
    }
}


$planetaHabitable1 = new PlanetaHabitable("Fión", 24, true, 1.5, 100000, 0, 10);
echo $planetaHabitable1->listaTodo();
echo "<br>";

$planetaHabitable1->setDistanciaTerra(1);
$planetaHabitable1->setNome("efrón");
$planetaHabitable1->setTemperaturaMaxima(30);
$planetaHabitable1->setTemperaturaMinima(3);


echo $planetaHabitable1->listaTodo();
echo "<br>";


$planetaHostil1 = new PlanetaHostil("Kaleva", 50, true, 0.4, true, true);
echo $planetaHostil1->listaTodo();



echo "<br>";
echo "Número planetas accesibles: " . Planeta::$numPlanetasAccesibles;

$planetaHostil1->explotou();

echo "<br>";
echo "Número planetas accesibles: " . Planeta::$numPlanetasAccesibles;
