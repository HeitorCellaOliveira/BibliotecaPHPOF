<!--Página de editar as informações de livro-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Atualizar Livro | Mascarenhas</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>Editar livro</h1>
    <?php
    #Conexão com o banco de dados.
    session_start();
    $hostname = '127.0.0.1';
    $user = 'root';
    $password = 'root';
    $database = 'biblioteca';
    $conexao = new mysqli($hostname, $user, $password, $database);
    if ($conexao->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
        exit();
        #Conexão com o banco de dados.
    } else {
        #Busca de informações de livros através de seu ID.
        $id = $conexao->real_escape_string($_POST['id']);
        $infosDeLivro = 'SELECT * FROM `acervo` WHERE `id` = ' . $id . ';';
        $resultado = $conexao->query($infosDeLivro);
        #Busca de informações de livros através de seu ID.
        #Form com as informações do livro, disponíveis para alteração ou não.
        if ($resultado->num_rows != 0) {
            $row = $resultado->fetch_array();
            echo '<form method="post" action="livroAtualizarBD.php" id="cadastro" name="cadastro">
            <label class="">Título </label><small>e subtítulo:</small>
            <br><input type="text" id="nome" name="nome" value="' . $row['nome'] . '" required>
            <br><br><label class="">Autor:</label>
            <br><input type="text" id="autor" name="autor" value="' . $row['autor'] . '" required>
            <br><br><label class="">Editora:</label>
            <br><input type="text" id="editora" name="editora" value="' . $row['editora'] . '" required>
            <br><br><label class="">Ano Publicado:</label>
            <br><input type="text" id="anoPublicado" name="anoPublicado" value="' . $row['anoPublicado'] . '" required>
            <br><br><label class="">N° de páginas:</label>
            <br><input type="text" id="nPags" name="nPags" value="' . $row['nPags'] . '" required>
            <br><br><label class="">ISBN:</label>
            <br><input type="text" id="isbn" name="isbn" value="' . $row['isbn'] . '" required>
            <br><br><label class="">Rua:</label>
            <br><input type="text" id="rua" name="rua" value="' . $row['rua'] . '" required>
            <br><br><label class="">Estante:</label>
            <br><input type="text" id="estante" name="estante" value="' . $row['estante'] . '" required>
            <br><br><label class="">Prateleira:</label>
            <br><input type="text" id="prateleira" name="prateleira" value="' .$row['prateleira'].'" required>
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
            <br><input type="text" id="qtdLivros" name="qtdLivros" value="' . $row['qtdLivros'] . '" required>
            <br><br><label class="">Antes de salvar, verifique se o gênero está correto!</label>
            <input type="hidden" value="' . $row['id'] . '" id="id" name="id">
            <br><input type="submit" value="Salvar">
        </form>';
            #Submit para o processo de apagar usuário.
            echo '<br><form method="post" action="apagarLivro.php" id="apagar" name="apagar">
                <input type="hidden" value="' . $row['id'] . '" id="id" name="id">
                <input type="submit" value="Apagar">
            </form>';
            #Submit para o processo de apagar usuário.
            #Retornar a página anterior.
            echo '<br><a href="livros.php">Voltar</a>';
            #Retornar a página anterior.
            $conexao->close();
            exit();
            #Form com as informações do livro, disponíveis para alteração ou não.
        }
    }
    ?>
</body>

</html>