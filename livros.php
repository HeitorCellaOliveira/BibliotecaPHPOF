<?php include('protect.php'); ?>

<!--Página de visualização de livros-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Livros | Mascarenhas</title>
    <link rel="stylesheet" href="">
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
                        Nome: " . $row['nome'] . "<br>Autor: " . $row['autor'] . "<br>Editora: " . $row['editora'] . "<br>Ano Publicado: " . $row['anoPublicado'] . "<br>ISBN: " . $row['isbn'] . "<br>Rua: " . $row['rua'] . "<br>Estante: " . $row['estante'] . "<br>Prateleira: ".$row['prateleira']."<br>Gênero: " . $row['genero'] . "<br>Quantidade disponível: " . $row['qtdLivros'] . '<br>Quantidade emprestada: ' . $row['qtdEmprestimo'] . '
                    </td>
                </tr>
            </table>';
            #Form para a função de editar informações de livros.
            echo "<form method='post' action='livroAtualizar.php'>
                            <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                            <input type='submit' value='Editar'>
                            </form><br>";
            #Form para a função de editar informações de livros.
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
</body>

</html> 