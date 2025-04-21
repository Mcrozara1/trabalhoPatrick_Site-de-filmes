<?php
require_once __DIR__ . '/../daos/FilmeDAO.php';

class FilmeController {
    private $dao;

    public function __construct() {
        $this->dao = new FilmeDAO();
    }

    public function listar() {
        $filmes = $this->dao->listarTodos();
        require_once __DIR__ . '/../views/filmes/listagem_filmes.php';
    }

    public function criar() {
        require_once __DIR__ . '/../views/filmes/cadastro_filme.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->salvar($_POST['titulo'], $_POST['ano']);
            header("Location: /filmes/listar");
        }
    }

    public function editar($id) {
        $filme = $this->dao->buscarPorId($id);
        require_once __DIR__ . '/../views/filmes/edicao_filme.php';
    }

    public function atualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->atualizar($id, $_POST['titulo'], $_POST['ano']);
            header("Location: /filmes/listar");
        }
    }

    public function excluir($id) {
        $this->dao->excluir($id);
        header("Location: /filmes/listar");
    }
}
?>