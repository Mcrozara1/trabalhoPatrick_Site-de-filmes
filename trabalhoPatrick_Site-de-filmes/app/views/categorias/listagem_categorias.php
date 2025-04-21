<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>📚 Categorias Cadastradas</h1>
    <a href="/categorias/criar">Nova Categoria</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?= $categoria['id'] ?></td>
            <td><?= htmlspecialchars($categoria['nome']) ?></td>
            <td>
                <a href="/categorias/editar/<?= $categoria['id'] ?>">Editar</a>
                <a href="/categorias/excluir/<?= $categoria['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>