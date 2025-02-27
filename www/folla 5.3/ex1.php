<?php


// Explicación dos cambios:

// Método __set:
// Este método recibe un atributo e un valor. Se o atributo existe na clase, establece o seu valor. Se non existe, mostra un erro indicando que o atributo non existe.
// property_exists se utiliza para comprobar se o atributo existe na clase antes de modificar o seu valor.

// Método __get:
// Permite acceder aos valores das propiedades privadas. Se o atributo existe, retorna o seu valor; se non, retorna NULL.

// Método __clone:
// Modifica o comportamento do operador clone, facendo que cada vez que se clona un obxecto, o id aumente en 1.

// Método __toString:
// Usado cando intentamos mostrar o obxecto usando echo. Chama ao método mostraArtigo() para devolver a representación en forma de texto das propiedades.

class Artigo
{
    private $id;
    private $nome;


    public function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }


    public function __set($atributo, $valor)
    {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        } else {
            echo "Non existe o atributo $atributo.\n";
        }
    }


    public function __get($atributo)
    {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
        return NULL;
    }

    public function __clone()
    {
        $this->id++;
    }


    public function __toString()
    {
        return $this->mostraArtigo();
    }

    private function mostraArtigo()
    {
        return "ID: " . $this->id . ", Nome: " . $this->nome;
    }
}


$artigo1 = new Artigo(1, "Artigo 1");


echo $artigo1 . "\n"; // ID: 1, Nome: Artigo 1

$artigo2 = clone $artigo1;
echo $artigo2 . "\n"; // ID: 2, Nome: Artigo 1


$artigo2->nome = "Artigo Clonado"; // Usamos __set para cambiar o nome
echo $artigo2 . "\n"; // ID: 2, Nome: Artigo Clonado

echo $artigo2->prezo; // Mensaxe de erro, non existe o atributo prezo

$artigo3 = clone $artigo2;
echo $artigo3;
