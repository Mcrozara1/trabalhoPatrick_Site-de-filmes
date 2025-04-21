==================================================
          PLATAFORMA DE AVALIAÇÃO DE FILMES          
==================================================

Um sistema CRUD completo para gerenciar filmes, categorias e avaliações, 
desenvolvido em PHP seguindo o padrão MVC com DAO. Projeto otimizado para 
execução em servidor local XAMPP.

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
              1. TECNOLOGIAS UTILIZADAS           
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

- Linguagem: PHP 7.4+
- Banco de Dados: MySQL
- Frontend: HTML5, CSS3 básico
- Padrões de Arquitetura: MVC (Model-View-Controller), DAO (Data Access Object)
- Bibliotecas: PDO para conexão com banco de dados
- Ferramenta de Desenvolvimento: XAMPP (Servidor local)

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
                  2. PRÉ-REQUISITOS               
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

- XAMPP 8.0+ instalado
- PHP 7.4+ ativado no XAMPP
- MySQL 5.7+ em execução
- Navegador moderno (Chrome, Firefox, Edge)
- Editor de código (VS Code, Sublime, etc.)

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
              3. INSTALAÇÃO COM XAMPP              
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

=== PASSO 1: CONFIGURAÇÃO DO PROJETO ===

1. Extraia a pasta do projeto para:
   C:\xampp\htdocs\plataforma-filmes

2. Verifique a estrutura:
   - A pasta "public" deve ser acessível via navegador

=== PASSO 2: BANCO DE DADOS ===

1. Inicie o XAMPP e ative Apache + MySQL
2. Acesse phpMyAdmin: http://localhost/phpmyadmin
3. Crie um novo banco de dados:
   - Nome: plataforma_filmes
   - Collation: utf8_general_ci

4. Execute este SQL na aba "SQL":

CREATE TABLE filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    ano_lancamento INT NOT NULL
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filme_id INT NOT NULL,
    categoria_id INT NOT NULL,
    nota INT CHECK (nota BETWEEN 1 AND 5),
    FOREIGN KEY (filme_id) REFERENCES filmes(id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

=== PASSO 3: CONFIGURAÇÃO DO BANCO ===

Edite o arquivo:
plataforma-filmes/config/database.php

Ajuste as credenciais (padrão XAMPP):
private $host = "localhost";
private $dbname = "plataforma_filmes";
private $username = "root";
private $password = "";

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
            4. ESTRUTURA DE DIRETÓRIOS             
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

plataforma-filmes/
├── app/
│   ├── controllers/      # Lógica das páginas
│   │   ├── FilmeController.php
│   │   ├── AvaliacaoController.php
│   │   └── CategoriaController.php
│   │
│   ├── daos/             # Conexão com banco
│   │   ├── FilmeDAO.php
│   │   ├── AvaliacaoDAO.php
│   │   └── CategoriaDAO.php
│   │
│   ├── models/           # Estrutura de dados
│   │   ├── Filme.php
│   │   ├── Avaliacao.php
│   │   └── Categoria.php
│   │
│   └── views/            # Interface do usuário
│       ├── filmes/
│       │   ├── listagem_filmes.php
│       │   ├── cadastro_filme.php
│       │   └── edicao_filme.php
│       │
│       ├── categorias/
│       │   ├── listagem_categorias.php
│       │   ├── cadastro_categoria.php
│       │   └── edicao_categoria.php
│       │
│       └── avaliacoes/
│           ├── listagem_avaliacoes.php
│           ├── formulario_avaliacao.php
│           └── edicao_avaliacao.php
│
├── config/
│   ├── database.php      # Configurações do MySQL
│   └── Router.php        # Sistema de rotas
│
└── public/
    └── index.php         # Ponto de entrada principal

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
               5. ROTAS DA APLICAÇÃO              
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

[FILMES]
GET    /filmes/listar        Lista todos os filmes
GET    /filmes/criar         Formulário de cadastro
POST   /filmes/salvar        Salva novo filme
GET    /filmes/editar/{id}   Formulário de edição
POST   /filmes/atualizar/{id} Atualiza filme
GET    /filmes/excluir/{id}  Exclui filme

[CATEGORIAS]
GET    /categorias/listar    Lista categorias
GET    /categorias/criar     Formulário de cadastro
POST   /categorias/salvar    Salva nova categoria
GET    /categorias/editar/{id} Formulário de edição
POST   /categorias/atualizar/{id} Atualiza categoria
GET    /categorias/excluir/{id} Exclui categoria

[AVALIAÇÕES]
GET    /avaliacoes/listar    Lista todas avaliações
GET    /avaliacoes/criar     Formulário de avaliação
POST   /avaliacoes/salvar    Salva nova avaliação
GET    /avaliacoes/editar/{id} Formulário de edição
POST   /avaliacoes/atualizar/{id} Atualiza avaliação

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
             6. FUNCIONALIDADES DETALHADAS        
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

● Cadastro de Filmes:
  - Título (obrigatório)
  - Ano de lançamento (número inteiro)
  - Validação contra dados duplicados

● Gestão de Categorias:
  - Nome único (validação de duplicidade)
  - Exclusão em cascata para avaliações relacionadas

● Sistema de Avaliações:
  - Nota de 1 a 5 (validação numérica)
  - Relacionamento entre filme e categoria
  - Listagem com JOIN entre tabelas

● Interface:
  - Tabelas responsivas
  - Formulários com validação HTML5
  - Navegação intuitiva entre seções

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
                 7. EXEMPLOS DE USO               
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

▶ Cadastrar Filme:
1. Acesse: http://localhost/plataforma-filmes/public/filmes/criar
2. Preencha:
   - Título: "Interestelar"
   - Ano: 2014
3. Clique em "Salvar"

▶ Criar Categoria:
1. Acesse: http://localhost/plataforma-filmes/public/categorias/criar
2. Digite: "Ficção Científica"
3. Clique em "Salvar"

▶ Avaliar Filme:
1. Acesse: http://localhost/plataforma-filmes/public/avaliacoes/criar
2. Selecione:
   - Filme: "Interestelar"
   - Categoria: "Ficção Científica"
   - Nota: 5
3. Clique em "Salvar Avaliação"

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
               8. MELHORIAS FUTURAS               
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

- [ ] Sistema de login de usuários
- [ ] Paginação nas listagens
- [ ] Gráficos de médias por categoria
- [ ] Upload de capas de filmes
- [ ] Busca avançada com filtros
- [ ] Exportação para PDF/Excel

■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
                    9. LICENÇA                   
■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

Este projeto é open-source sob licença MIT. Permite uso comercial,
modificação e distribuição livre. Atribuição não é necessária.

Desenvolvido por Matheus e Pablo - 22/04/2025
**vlw Patrick,passamos o feriado da Pascoa terminando**