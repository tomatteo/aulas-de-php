<?php

try {
    $pdo = new PDO(
        "mysql:host=db;dbname=loja;charset=utf8mb4",
        "root", "root"
    );
    echo "Conexão com o banco de dados estabelecida com sucesso!";

} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}