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

    .logo {
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
        position: relative;
        overflow-y: hidden; 
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
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #ffffff;
        font-size: 2rem;
        z-index: 2;
    }

    .sidebar {
        position: fixed;
        right: -250px;
        top: 0;
        width: 250px;
        height: 100%;
        background-color: #f0f0f0;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        transition: right 0.3s;
        z-index: 1000;
        text-align: center;
    }

    .sidebar.active {
        right: 0;
    }

    .sidebar a {
    display: block;
    padding: 15px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s, color 0.3s; 
}

    .sidebar a:hover {
    background-color: #ddd;
    color: #666; 
}

    .icon-menu {
        position: fixed;
        top: 20px;
        right: 20px;
        cursor: pointer;
        color: #fff;
        font-size: 2rem;
        z-index: 1001;
    }

    .icon-menu.white {
        color: #fff;
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
        background-color: #000000;
        color: #fff;
        padding: 25px;
        text-align: center;
        top: 827px;
        width: 100%;
        position: fixed; 
        bottom: 0; 
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
</head>
<body>
<nav class="navbar">
    <img src="Imagens/logo.png" class="logo">
    <div class="icon-menu white" id="icon-menu">
        <i class="fas fa-bars fa-2xl"></i>
    </div>
    <a href="index.php">Início</a>
    <a href="catalogo.php">Acervo</a>
    <a href="clubeLivro.php">Clube do Livro</a>
    <a href="statusAluno.php">Status do Aluno</a>
    <a href="rankingLivros.php">Ranking de livros</a>
</nav>

<div class="sidebar" id="sidebar">
    <a href="emprestimo.php">Empréstimos</a>
    <a href="livroCadastrar.php">Livros Novos</a>
    <a href="livros.php">Livros</a>
    <a href="estudantes.php">Estudantes</a>
    <a href="turmas.php">Turmas</a>
    <a href="logout.php">Sair da Conta</a>
</div>

  <img src="Imagens/baner.png" class="banner">
  
  

    <p class="welcome"> Bem-vindo <br> <?php echo $_SESSION['nomeUsuario']; ?><p>
    

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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const iconMenu = document.querySelector('#icon-menu');
            const sidebar = document.querySelector('#sidebar');

            iconMenu.addEventListener('click', function () {
                sidebar.classList.toggle('active');
                if (sidebar.classList.contains('active')) {
                iconMenu.style.right = '265px';
            } else {
                iconMenu.style.right = '20px';
            }
            });
        });
    </script>
</body>
</html>
