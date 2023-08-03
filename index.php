<?php
include('protect.php');


$servername = '127.0.0.1';
$username = 'root';
$senha = 'root';
$dbname = 'biblioteca';


$conexao = new mysqli($servername, $username, $senha, $dbname);


if ($conexao->connect_error) {
    die ("Falha ao conectar com o MySQL: " . $conexao->connect_error);
}


$sql = "SELECT * FROM `acervo`";
$result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
    <title>Início | Mascarenhas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap');


    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        text-transform: none;
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


    .welcome {
       
        font-family: 'Philosopher', sans-serif;
        position: absolute;
        top: 150px;
        left: 25%;
        transform: translateX(-50%);
        font-size: 5em;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }


    .banner {
        position: relative;
       
    }


    footer {
        background-color: rgb(0, 0, 0);
        position:relative;
        background-color: #000000;
        color: #fff;
        padding: 25px;
        text-align: center;
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
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Início</a>
        <a href="catalogo.php">Acervo</a>
        <a href="clubeLivro.php">Clube do Livro</a>
        <a href="encontreLivro.php">Encontre seu Livro</a>
        <a href="statusAluno.php">Status do Aluno</a>
        <a href="rankingLivros.php">Ranking de livros</a>
        <div class="icon-menu" id="icon-menu">
            <i class="fas fa-bars fa-2xl"></i>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="cadastroTurmas.php">Turmas</a>
            <a href="cadastroAlunos.php">Cadastro de Alunos</a>
            <a href="buscarAluno.php">Lista de Alunos</a>
            <a href="buscarAluno.php">Lista de Multas</a>
            <a href="cadastroLivros.php">Cadastrar Livros</a>
            <a href="buscarLivro.php">Lista de Livros</a>
            <a href="logout.php">Sair da Conta</a>
        </div>
    </nav>


    <p class="welcome"> Bem vindo <br> <?php echo $_SESSION['nomeUsuario']; ?><p>
    <img src="images/banner.png" class="banner">


    <footer>
        <p>&copy; 2023 - Todos os direitos reservados</p>
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


    <script>
    // JavaScript code to toggle the dropdown menu
    document.addEventListener('DOMContentLoaded', function () {
        const iconMenu = document.querySelector('#icon-menu');
        const dropdownMenu = document.querySelector('#dropdown-menu');


        iconMenu.addEventListener('click', function (event) {
            event.stopPropagation(); // Prevent triggering clicks on document when the menu is open
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });


        // Close the dropdown menu when clicking outside of it
        document.addEventListener('click', function (event) {
            if (!dropdownMenu.contains(event.target) && !iconMenu.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });


        // Hide the dropdown menu on page load
        dropdownMenu.style.display = 'none';
    });
    </script>
</body>
</html>