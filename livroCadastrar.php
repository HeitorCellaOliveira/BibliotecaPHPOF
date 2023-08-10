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
    
    footer {
      background-color: rgb(0, 0, 0);
        background-color: #000000;
        color: #fff;
        padding: 25px;
        text-align: center;
        top:827px;
        width: 100%;
        position: fixed; /* Adiciona posição fixa para garantir que o footer fique no rodapé da página */
        bottom: 0; /* Posiciona o footer na parte inferior da página */
        left: 0; 
    }


    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }


    li {
        display: inline-block;
        margin: 0 10px;
    }


    a {
        color: #fff;
        text-decoration: none;
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
        <footer>
        <p>&copy; 2023 - Todos os direitos reservados </p>
        <br>
        <nav>
            <ul>
                <li><a href="#">Termos de uso</a></li>
                <li><a href="#">Política de privacidade</a></li>
                <li><a href="#">Sobre nós</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>
    </footer>



</body>

</html>
 
 
 
 
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
        <br><br><label class="">Rua:</label>
        <br><input type="text" id="rua" name="rua" required>
        <br><br><label class="">Estante:</label>
        <br><input type="text" name="estante" id="estante" required>
        <br><br><label class="">Prateleira:</label>
        <br><input type="text" name="prateleira" id="prateleira" required>
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