<?php
require_once __DIR__ . '/../daos/CategoriaDAO.php';

class CategoriaController {
    private $dao;

    public function __construct() {
        $this->dao = new CategoriaDAO();
    }

    public function listar() {
        $categorias = $this->dao->listarTodos(); 
        require_once __DIR__ . '/../views/categorias/listagem_categorias.php';
    }

    public function criar() {
        require_once __DIR__ . '/../views/categorias/cadastro_categoria.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->salvar($_POST['nome']);
            header("Location: /categorias/listar");
        }
    }

    public function editar($id) {
        $categoria = $this->dao->buscarPorId($id);
        require_once __DIR__ . '/../views/categorias/edicao_categoria.php';
    }

    public function atualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->atualizar($id, $_POST['nome']);
            header("Location: /categorias/listar");
        }
    }

    public function excluir($id) {
        $this->dao->excluir($id);
        header("Location: /categorias/listar");
    }
}
?>