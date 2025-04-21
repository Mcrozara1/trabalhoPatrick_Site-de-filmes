<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoria</title>
</head>
<body>
    <h1>✏️ Editar Categoria</h1>
    <form method="POST" action="/categorias/atualizar/<?= $categoria['id'] ?>">
        <input type="text" name="nome" value="<?= $categoria['nome'] ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>