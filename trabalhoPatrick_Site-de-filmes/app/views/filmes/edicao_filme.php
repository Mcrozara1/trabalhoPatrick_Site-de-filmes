<!DOCTYPE html>
<html>
<head>
    <title>Editar Filme</title>
</head>
<body>
    <h1>✏️ Editar Filme</h1>
    <form method="POST" action="/filmes/atualizar/<?= $filme['id'] ?>">
        <input type="text" name="titulo" value="<?= $filme['titulo'] ?>" required>
        <input type="number" name="ano" value="<?= $filme['ano_lancamento'] ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>