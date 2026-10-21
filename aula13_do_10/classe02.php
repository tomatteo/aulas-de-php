
<?php

class Produto {
    const IMPOSTO = 0.1;
    private static int $total = 0;
    private string $preco = "0.00";

    public function __construct(
        public string $nome
    ) {
        self::$total++;
    }

    public static function quantidade(): int {
        return self::$total;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setPreco(float $preco): void {
        $this->preco = (string) $preco;
    }

    public function getPreco(): string {
        return $this->preco;
    }
}

new Produto("Camiseta");
new Produto("Boné");

echo Produto::quantidade() . " produtos<br>";
echo "Imposto: " . Produto::IMPOSTO . "<br>";

$p = new Produto("Calça");
$p->setNome("Calça");
$p->setPreco(49.90);

echo $p->getNome() . "<br>";
echo $p->getPreco();
