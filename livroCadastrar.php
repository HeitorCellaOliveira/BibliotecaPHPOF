 <!--Página de cadastro de livro-->
 <!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>LivroTeca</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <!--Forms para cadastro-->
    <h1>Cadastro de livro</h1>
    <form method="post" action="livroCadastrarBD.php" id="cadastro" name="cadastro" enctype="multipart/form-data">
        <label class="">Título: </label><small>e subtítulo:</small>
        <br><input type="text" id="nome" name="nome" required>
        <br><br><label class="">Autor:</label>
        <br><input type="text" id="autor" name="autor" required>
        <br><br><label class="">Editora:</label>
        <br><input type="text" id="editora" name="editora" required>
        <br><br><label class="">Ano:</label>
        <br><input type="text" id="anoPublicado" name="anoPublicado" required>
        <br><br><label class="">N° de páginas:</label>
        <br><input type="text" id="nPags" name="nPags" required>
        <br><br><label class="">ISBN:</label>
        <br><input type="text" id="isbn" name="isbn" required>
        <br><br><label class="">CDD:</label>
        <br><input type="text" id="cdd" name="cdd" required>
        <br><br><label class="">CDU:</label>
        <br><input type="text" id="cdu" name="cdu" required>
        <br><br><label class="">Gênero:</label>
        <!--Todas as opções de gênero literário-->
        <br><select id="genero" name="genero">
            <option value="Fantasia">Fantasia</option>
            <option value="Ficção científica">Ficção científica</option>
            <option value="Ação e aventura">Ação e aventura</option>
            <option value="Ficção policial">Ficção policial</option>
            <option value="Horror">Horror</option>
            <option value="Suspense">Suspense</option>
            <option value="Romance">Romance</option>
            <option value="Conto">Conto</option>
            <option value="Autobiografia">Autobiografia</option>
            <option value="Biografia">Biografia</option>
            <option value="História">História</option>
            <option value="Crimes reais">Crimes reais</option>
            <option value="Infantil">Infantil</option>
            <option value="Tecnologia">Tecnologia</option>
            <option value="Poesia">Poesia</option>
            <option value="Educação">Educação</option>
        </select>
        <!--Todas as opções de gênero literário-->
        <br><br><label class="">Quantidade:</label>
        <br><input type="text" id="qtdLivros" name="qtdLivros" required>
        <br><br><label class="">Capa:</label>
        <br><input type="file" name="capaLivro" accept="image/*">
        <br><br><input type="submit" value="Cadastrar">
    </form>
    <!--Forms para cadastro-->
    <!--Retornar a página anterior-->
    <br><a href='livros.php'>Voltar</a>
    <!--Retornar a página anterior-->
</body>

</html>