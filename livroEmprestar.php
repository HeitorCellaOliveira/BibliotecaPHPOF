
<!-- Página de emprestar livro -->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">

<head>
    <!-- ... Cabeçalho e estilos CSS ... -->
</head>

<body>

    <h1>Emprestar livros</h1>

    <!-- Formulário de empréstimo -->
    <form method="post" action="livroEmprestarBD.php" id="emprestar" name="emprestar">
    <label for="livro">Livro selecionado:</label>
    <input type="text" name="livroID" id="livroID" required>
    <br>

    <label for="aluno">Nº de Matrícula:</label>
    <input type="text" id="estudanteID" name="estudanteID" required><br>

    <label for="dataEmprestimo">Data do Empréstimo:</label>
    <input type="date" id="dataEmprestimo" name="dataEmprestimo" required><br>

    <input type="submit" value="Emprestar">
    </form>

    <br><a href='catalogo.php'>Voltar</a>
</body>

</html>
