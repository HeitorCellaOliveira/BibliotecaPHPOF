<?php include('protect.php');?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Devolução de Livros</title>
</head>

<body>
    <h1>Devolução de Livros</h1>

    <!-- Formulário de devolução -->
    <form method="post" action="livroDevolucaoBD.php">
        <label for="nMatricula">Nº de Matrícula do Aluno:</label>
        <input type="text" id="nMatricula" name="nMatricula" required>
        <br>

        <label for="livroNome">Nome do Livro:</label>
        <input type="text" id="livroNome" name="livroNome" required>
        <br>

        <input type="submit" value="Devolver">
    </form>

    <br><a href="catalogo.php">Voltar</a>
</body>

</html>
