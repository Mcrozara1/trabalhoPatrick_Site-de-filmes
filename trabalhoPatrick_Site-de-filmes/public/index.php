<?php
require_once __DIR__ . '/../config/Router.php';
require_once __DIR__ . '/../app/controllers/FilmeController.php';
require_once __DIR__ . '/../app/controllers/AvaliacaoController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';

// Rotas para Filmes
Router::get('/filmes/listar', function () {
    $controller = new FilmeController();
    $controller->listar();
});

Router::get('/filmes/criar', function () {
    $controller = new FilmeController();
    $controller->criar();
});

Router::post('/filmes/salvar', function () {
    $controller = new FilmeController();
    $controller->salvar();
});

Router::get('/filmes/editar/:id', function ($id) {
    $controller = new FilmeController();
    $controller->editar($id);
});

Router::post('/filmes/atualizar/:id', function ($id) {
    $controller = new FilmeController();
    $controller->atualizar($id);
});

Router::get('/filmes/excluir/:id', function ($id) {
    $controller = new FilmeController();
    $controller->excluir($id);
});

// Rotas para Avaliações
Router::get('/avaliacoes/listar', function () {
    $controller = new AvaliacaoController();
    $controller->listar();
});

Router::get('/avaliacoes/criar', function () {
    $controller = new AvaliacaoController();
    $controller->criar();
});

Router::post('/avaliacoes/salvar', function () {
    $controller = new AvaliacaoController();
    $controller->salvar();
});

Router::get('/avaliacoes/editar/:id', function ($id) {
    $controller = new AvaliacaoController();
    $controller->editar($id);
});

Router::post('/avaliacoes/atualizar/:id', function ($id) {
    $controller = new AvaliacaoController();
    $controller->atualizar($id);
});

// Rotas para Categorias
Router::get('/categorias/listar', function () {
    $controller = new CategoriaController();
    $controller->listar();
});

Router::get('/categorias/criar', function () {
    $controller = new CategoriaController();
    $controller->criar();
});

Router::post('/categorias/salvar', function () {
    $controller = new CategoriaController();
    $controller->salvar();
});

Router::get('/categorias/editar/:id', function ($id) {
    $controller = new CategoriaController();
    $controller->editar($id);
});

Router::post('/categorias/atualizar/:id', function ($id) {
    $controller = new CategoriaController();
    $controller->atualizar($id);
});

Router::get('/categorias/excluir/:id', function ($id) {
    $controller = new CategoriaController();
    $controller->excluir($id);
});

Router::dispatch();
