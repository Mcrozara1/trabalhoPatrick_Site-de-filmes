<!DOCTYPE html>
<html>
<head>
    <title>Avaliar Filme</title>
</head>
<body>
    <h1>⭐ Avaliar Filme</h1>
    <form method="POST" action="/avaliacoes/salvar">
        <label>Filme:
            <select name="filme_id" required>
                <?php foreach ($filmes as $filme): ?>
                    <option value="<?= $filme['id'] ?>"><?= $filme['titulo'] ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Categoria:
            <select name="categoria_id" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Nota (1-5):
            <input type="number" name="nota" min="1" max="5" required>
        </label>

        <button type="submit">Salvar Avaliação</button>
    </form>
</body>
</html>