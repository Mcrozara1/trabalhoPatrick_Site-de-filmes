<?php
require_once __DIR__ . '/../../config/database.php';

class FilmeDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = DatabaseConnection::getInstance()->getConnection();
    }

    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM filmes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($titulo, $ano) {
        $stmt = $this->pdo->prepare("INSERT INTO filmes (titulo, ano_lancamento) VALUES (?, ?)");
        $stmt->execute([$titulo, $ano]);
        return $this->pdo->lastInsertId();
    }

    public function atualizar($id, $titulo, $ano) {
        $stmt = $this->pdo->prepare("UPDATE filmes SET titulo = ?, ano_lancamento = ? WHERE id = ?");
        return $stmt->execute([$titulo, $ano, $id]);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM filmes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM filmes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>