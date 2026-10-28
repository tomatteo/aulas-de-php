<?php
require __DIR__ . '/../autoload.php';
use App\Database\Conexao;

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $stmt = Conexao::get()->prepare('DELETE FROM produtos WHERE id = :id');
    $stmt->execute([':id' => $id]);
}
header('Location: index.php');
exit;
