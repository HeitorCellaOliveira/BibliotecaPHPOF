<?php include('protect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
    <title> Início | Mascarenhas </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap');


    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        text-transform: none;
    }

    .logo{
      left:1%;
      position: absolute;
      width:7%;
      top:-5px;
    }
    .navbar {
        text-align: center;
        background-color: rgb(0, 0, 0);
        height: 70px;
        overflow-x: hidden;
    }


    .navbar a {
        justify-content: center;
        align-items: center;
        left: -18rem;
        position: relative;
        top: 20px;
        margin: 0 1rem;
        font-size: 1.4rem;
        color: #ffffff;
        text-decoration: none;
    }


    .navbar .icon-menu {
        position: relative;
        left: 95%;
        display: flex;
        cursor: pointer;
        color: #ffffff;
        top: -5px;
        font-size: 2rem;
        z-index: 2;
    }


    .navbar .dropdown-menu {
        display: none;
        position: absolute;
        width: 20rem;
        left: 90%;
        transform: translateX(-50%);
        background-color: #ffffff;
        color: #fffefe;
        padding: 10px;
        border-radius: 5px;
        top: 50px;
        height: 400px;
        z-index: 3;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow-x: hidden;
    }


    .navbar .dropdown-menu a {
        justify-content: center;
        align-items: center;
        display: block;
        padding: 10px 10px;
        border-bottom: 1px solid black;
        color: black;
        margin: 10px;
        width: 100%;
        text-align: center;
        left: 0%;
        top: -100;
    }


    .navbar .dropdown-menu a:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }
    </style>
    <title> Catálogo | Mascarenhas</title>

</head>

<body>
<nav class="navbar">
        <img src="Imagens/logo.png" class="logo">
        <a href="index.php">Início</a>
        <a href="catalogo.php">Acervo</a>
        <a href="clubeLivro.php">Clube do Livro</a>
        <a href="statusAluno.php">Status do Aluno</a>
        <a href="rankingLivros.php">Ranking de livros</a>
        <div class="icon-menu" id="icon-menu">
        <i class="fas fa-bars fa-2xl"></i>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="emprestimo.php">Empréstimos</a>
            <a href="livroCadastrar.php">Livros Novos</a>
            <a href="livros.php">Livros</a>
            <a href="estudantes.php">Estudantes</a>
            <a href="turmas.php">Turmas</a>
            <a href="logout.php">Sair da Conta</a>
        </div>
    </nav>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const iconMenu = document.querySelector('#icon-menu');
        const dropdownMenu = document.querySelector('#dropdown-menu');


        iconMenu.addEventListener('click', function (event) {
            event.stopPropagation(); 
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });


        
        document.addEventListener('click', function (event) {
            if (!dropdownMenu.contains(event.target) && !iconMenu.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });

        dropdownMenu.style.display = 'none';
    });
    </script>

</body>

</html>



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
            <br><br><label class="">CDD:</label>
            <br><input type="text" id="cdd" name="cdd" value="' . $row['cdd'] . '" required>
            <br><br><label class="">CDU:</label>
            <br><input type="text" id="cdu" name="cdu" value="' . $row['cdu'] . '" required>
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