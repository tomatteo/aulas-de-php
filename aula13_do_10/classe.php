<?php

class Produto {
    public function __construct(
        public string $nome,
        public float $preco,
        public int $estoque = 0
    ) {}
  
    public function aplicarDesconto(float $pct): float {
        return $this->preco * (1 - $pct / 100);
    }
}

$produtos = [
    new Produto("Camiseta", 50.0, 10),
    new Produto("Calça", 100.0, 20),
    new Produto("Boné", 15.00, 2)
];

foreach ($produtos as $p) {
    echo "Nome: " . $p->nome . " / Preço: " . number_format($p->preco, 2, ',', '.'). "<br>";
}
