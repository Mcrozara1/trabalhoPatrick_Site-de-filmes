<!DOCTYPE html>
<html>
<head>
    <title>Avaliações</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>📊 Todas as Avaliações</h1>
    <a href="/avaliacoes/criar">Nova Avaliação</a>
    
    <table>
        <tr>
            <th>Filme</th>
            <th>Categoria</th>
            <th>Nota</th>
            <th>Ações</th> 
        </tr>
        <?php foreach ($avaliacoes as $avaliacao): ?>
        <tr>
            <td><?= $avaliacao['titulo'] ?></td>
            <td><?= $avaliacao['categoria'] ?></td>
            <td><?= $avaliacao['nota'] ?></td>
            <td>
                <a href="/avaliacoes/editar/<?= $avaliacao['id'] ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>