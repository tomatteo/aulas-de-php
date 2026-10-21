
<?php

class Produto {
    private float $preco;

    public function __construct(
        public string $nome,
        float $preco
    ) {
        $this->setPreco($preco);
    }

    public function setPreco(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("Preço inválido.");
        }

        $this->preco = $valor;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }
}

$p = new Produto("Camiseta", 59.90);

$p->setNome("Calça");
$p->setPreco(49.90);

echo $p->getNome() . "<br>";
echo $p->getPreco();
