<?php
require __DIR__ . '/autoload.php';
use App\Support\CarrinhoSessao;

$carrinho = new CarrinhoSessao();
$carrinho->adicionar((int)($_GET['id'] ?? 0));
header('Location: carrinho.php'); exit;