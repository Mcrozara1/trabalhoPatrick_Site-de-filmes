<?php
require_once __DIR__ . '/../../config/database.php';

class AvaliacaoDAO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::getInstance()->getConnection();
    }

    public function listarTodas()
    {
        $stmt = $this->pdo->query("
            SELECT avaliacoes.*, filmes.titulo, categorias.nome as categoria 
            FROM avaliacoes
            INNER JOIN filmes ON avaliacoes.filme_id = filmes.id
            INNER JOIN categorias ON avaliacoes.categoria_id = categorias.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar(Avaliacao $avaliacao)
    {
        $stmt = $this->pdo->prepare("INSERT INTO avaliacoes (filme_id, categoria_id, nota) VALUES (?, ?, ?)");
        $stmt->execute([$avaliacao->filme_id, $avaliacao->categoria_id, $avaliacao->nota]);
    }

    public function calcularMediaPorFilme($filme_id)
    {
        $stmt = $this->pdo->prepare("
            SELECT AVG(nota) as media 
            FROM avaliacoes 
            WHERE filme_id = ?
        ");
        $stmt->execute([$filme_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['media'];
    }
    public function buscarPorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM avaliacoes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Avaliacao $avaliacao)
    {
        $stmt = $this->pdo->prepare("UPDATE avaliacoes SET filme_id = ?, categoria_id = ?, nota = ? WHERE id = ?");
        $stmt->execute([$avaliacao->filme_id, $avaliacao->categoria_id, $avaliacao->nota, $avaliacao->id]);
    }
}
