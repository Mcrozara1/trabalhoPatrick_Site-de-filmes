<?php
require_once __DIR__ . '/../daos/AvaliacaoDAO.php';
require_once __DIR__ . '/../daos/FilmeDAO.php';
require_once __DIR__ . '/../daos/CategoriaDAO.php';

class AvaliacaoController
{
    private $avaliacaoDAO;
    private $filmeDAO;
    private $categoriaDAO;

    public function __construct()
    {
        $this->avaliacaoDAO = new AvaliacaoDAO();
        $this->filmeDAO = new FilmeDAO();
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function listar()
    {
        $avaliacoes = $this->avaliacaoDAO->listarTodas();
        require_once __DIR__ . '/../views/avaliacoes/listagem_avaliacoes.php';
    }

    public function criar()
    {
        $filmes = $this->filmeDAO->listarTodos();
        $categorias = $this->categoriaDAO->listarTodos();
        require_once __DIR__ . '/../views/avaliacoes/formulario_avaliacao.php';
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $avaliacao = new Avaliacao();
            $avaliacao->filme_id = $_POST['filme_id'];
            $avaliacao->categoria_id = $_POST['categoria_id'];
            $avaliacao->nota = $_POST['nota'];
            $this->avaliacaoDAO->salvar($avaliacao);
            header("Location: /avaliacoes/listar");
        }
    }

    public function editar($id)
    {
        $avaliacao = $this->avaliacaoDAO->buscarPorId($id);
        $filmes = $this->filmeDAO->listarTodos();
        $categorias = $this->categoriaDAO->listarTodos();
        require_once __DIR__ . '/../views/avaliacoes/edicao_avaliacao.php';
    }

    public function atualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $avaliacao = new Avaliacao();
            $avaliacao->id = $id;
            $avaliacao->filme_id = $_POST['filme_id'];
            $avaliacao->categoria_id = $_POST['categoria_id'];
            $avaliacao->nota = $_POST['nota'];
            $this->avaliacaoDAO->atualizar($avaliacao);
            header("Location: /avaliacoes/listar");
        }
    }
}
