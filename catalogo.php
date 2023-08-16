<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
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

    </style>
    <title>Empréstimos | Mascarenhas</title>

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

    <h1>Livros</h1>
    <?php
    #Conexão com o banco de dados.
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
        #Lista com todos os livros.
        $mostrarLivros = 'SELECT * FROM `acervo`';
        $resultado = $conexao->query($mostrarLivros);
        #Campo para busca de livro.
        echo "<input type='text' id='pesquisa' onkeyup='showHint(this.value)' placeholder='Pesquise por título'>
        <span id='txtHint'></span>
        <script>
        function showHint(str) {
            if (str.length == 0) { 
              document.getElementById('txtHin').innerHTML = '';
              return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('txtHint').innerHTML = this.responseText;
                }
            };
            xhttp.open('GET', 'livroPesquisar.php?nomePesquisado='+str, true);
            xhttp.send();
          }
        </script><br>";
        #Campo para busca de livro.
        while ($row = mysqli_fetch_array($resultado)) {
            echo "<br><table style='width: 20%;'>
                <tr>
                    <td style='width: 40%;'>
                        <img src='Imagens/" . $row['capaLivro'] . "' style='width: 100%'>  
                    </td>
                    <td>
                        Título: " . $row['nome'] . "<br>Autor: " . $row['autor'] . "<br>Editora: " . $row['editora'] . "<br>Ano de Publicação: " . $row['anoPublicado'] . "<br>ISBN: " . $row['isbn'] . "<br>Rua: " . $row['rua'] . "<br>Estante: " . $row['estante'] . "<br>Prateleira: ". $row['prateleira'] ."<br>Gênero: " . $row['genero'] .'
                    </td>
                </tr>
            </table>';
            #Form para a função de emprestar livros.
            echo "<form method='post' action='livroEmprestar.php'>
                    <input type='hidden' value='" . $row['nome'] . "' id='nome' name='nome'>
                    <input type='submit' value='Emprestar'>
                    </form>";
            #Form para a função de emprestar livros.
        }
        #Lista com todos os livros.
    }
    ?>
    <!--Retornar a página anterior-->
    <br><a href='index.php'>Voltar</a>
    <!--Retornar a página anterior-->