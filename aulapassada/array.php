<?php

$frutas = ["banana", "maçã", "laranja", "uva"];

foreach ($frutas as $i => $fruta) {
    echo "$i - " . strtoupper($fruta) . "<br>";
}

$produto = ["nome" => "camiseta", "preco" => 49.90];

echo $produto["nome"];

$frutas[] = "abacaxi";
?>