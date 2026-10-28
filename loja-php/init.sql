CREATE TABLE IF NOT EXISTS produtos (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  estoque INT NOT NULL DEFAULT 0,
  tipo ENUM('fisico','digital') NOT NULL DEFAULT 'fisico',
  peso_kg DECIMAL(6,3) NULL,
  link_download VARCHAR(255) NULL
);

INSERT INTO produtos (nome, preco, estoque)
SELECT 'Camiseta PHP', 59.90, 10
WHERE NOT EXISTS (SELECT 1 FROM produtos);
