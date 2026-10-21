<?php

require_once 'produto.php';
require_once 'carrinho.php';
require_once 'cliente.php';
require_once 'conta.php';

// 1. Criar Cliente e Conta
$cliente = new Cliente('João', 'joao@email.com');
$conta = new Conta(500.00);

// 2. Criar Produtos (id, nome, preço, estoque)
$p1 = new Produto(1, 'Mouse', 100.00, 5);
$p2 = new Produto(2, 'Teclado', 200.00, 3);

// 3. Adicionar ao Carrinho
$carrinho = new Carrinho();
$carrinho->adicionar($p1, 1);
$carrinho->adicionar($p2, 1);

// 4. Testar Operações (muda os valores para ver o que acontece!)
$total = $carrinho->total();
$conta->sacar($total);

// 5. Mostrar na tela
echo "Cliente: " . $cliente->getNome() . "<br>";
echo "Total do Carrinho: R$ " . $total . "<br>";
echo "Saldo Restante: R$ " . $conta->getSaldo() . "<br>";