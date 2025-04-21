<!DOCTYPE html>
<html>
<head>
    <title>Editar Avaliação</title>
</head>
<body>
    <h1>✏️ Editar Avaliação</h1>
    <form method="POST" action="/avaliacoes/atualizar/<?= $avaliacao['id'] ?>">
        <label>Filme:
            <select name="filme_id" required>
                <?php foreach ($filmes as $filme): ?>
                    <option value="<?= $filme['id'] ?>" <?= $filme['id'] == $avaliacao['filme_id'] ? 'selected' : '' ?>>
                        <?= $filme['titulo'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Categoria:
            <select name="categoria_id" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $avaliacao['categoria_id'] ? 'selected' : '' ?>>
                        <?= $categoria['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Nota (1-5):
            <input type="number" name="nota" min="1" max="5" value="<?= $avaliacao['nota'] ?>" required>
        </label>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>