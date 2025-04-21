<!DOCTYPE html>
<html>
<head>
    <title>Novo Filme</title>
</head>
<body>
    <h1>🎥 Novo Filme</h1>
    <form method="POST" action="/filmes/salvar">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="number" name="ano" placeholder="Ano de Lançamento" required>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>