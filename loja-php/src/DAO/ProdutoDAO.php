<?php
namespace App\DAO;

use App\Model\Produto;
use App\Model\ProdutoDigital;
use App\Model\ProdutoFisico;
use PDO;

class ProdutoDAO {
    public function __construct(private PDO $pdo) {}

    public function inserir(Produto $p): int {
        $st = $this->pdo->prepare(
            'INSERT INTO produtos (nome, preco, estoque, tipo, peso_kg, link_download)
             VALUES (:n, :p, :e, :t, :w, :l)'
        );
        $st->execute([
            ':n' => $p->getNome(),
            ':p' => $p->getPreco(),
            ':e' => $p->getEstoque(),
            ':t' => $p instanceof ProdutoDigital ? 'digital' : 'fisico',
            ':w' => $p instanceof ProdutoFisico ? $p->getPesoKg() : null,
            ':l' => $p instanceof ProdutoDigital ? $p->getLinkDownload() : null,
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function listar(): array {
        $linhas = $this->pdo->query('SELECT * FROM produtos ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        return array_map([$this, 'hidratar'], $linhas);
    }

    public function buscar(int $id): ?Produto {
        $st = $this->pdo->prepare('SELECT * FROM produtos WHERE id = :id');
        $st->execute([':id' => $id]);
        $linha = $st->fetch(PDO::FETCH_ASSOC);

        return $linha ? $this->hidratar($linha) : null;
    }

    public function atualizar(Produto $p): bool {
        $st = $this->pdo->prepare(
            'UPDATE produtos
             SET nome=:n, preco=:p, estoque=:e, tipo=:t, peso_kg=:w, link_download=:l
             WHERE id=:id'
        );

        return $st->execute([
            ':n' => $p->getNome(),
            ':p' => $p->getPreco(),
            ':e' => $p->getEstoque(),
            ':t' => $p instanceof ProdutoDigital ? 'digital' : 'fisico',
            ':w' => $p instanceof ProdutoFisico ? $p->getPesoKg() : null,
            ':l' => $p instanceof ProdutoDigital ? $p->getLinkDownload() : null,
            ':id' => $p->getId(),
        ]);
    }

    public function excluir(int $id): bool {
        $st = $this->pdo->prepare('DELETE FROM produtos WHERE id = :id');
        return $st->execute([':id' => $id]);
    }

    public function hidratar(array $linha): Produto {
        if (($linha['tipo'] ?? 'fisico') === 'digital') {
            return new ProdutoDigital(
                (int) $linha['id'],
                $linha['nome'],
                (float) $linha['preco'],
                (int) $linha['estoque'],
                (string) ($linha['link_download'] ?? '')
            );
        }

        return new ProdutoFisico(
            (int) $linha['id'],
            $linha['nome'],
            (float) $linha['preco'],
            (int) $linha['estoque'],
            (float) ($linha['peso_kg'] ?? 0)
        );
    }
}
