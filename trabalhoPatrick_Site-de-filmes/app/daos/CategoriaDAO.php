<?php
require_once __DIR__ . '/../../config/database.php';

class CategoriaDAO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::getInstance()->getConnection();
    }

    public function salvar($nome)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categorias (nome) VALUES (?)");
        $stmt->execute([$nome]);
        return $this->pdo->lastInsertId();
    }

    public function buscarPorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome)
    {
        $stmt = $this->pdo->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    public function excluir($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categorias WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function listarTodos()
    {
        $stmt = $this->pdo->query("SELECT * FROM categorias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
