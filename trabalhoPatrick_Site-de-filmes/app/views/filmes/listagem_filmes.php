<!DOCTYPE html>
<html>
<head>
    <title>Filmes</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Filmes Cadastrados</h1>
    <a href="/filmes/criar">Novo Filme</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($filmes as $filme): ?>
        <tr>
            <td><?= $filme['id'] ?></td>
            <td><?= htmlspecialchars($filme['titulo']) ?></td>
            <td><?= $filme['ano_lancamento'] ?></td>
            <td>
                <a href="/filmes/excluir/<?= $filme['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>