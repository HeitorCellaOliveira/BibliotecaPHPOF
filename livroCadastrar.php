
<?php
   $hostname = '127.0.0.1';
   $user = 'root';
   $password = 'root';
   $database = 'biblioteca';

   $conexao = new mysqli($hostname, $user, $password, $database);
   
   if ($conexao->connect_errno) {
       echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
       exit();
   }
   
   $livro = ""; // Inicializa a variável para evitar o erro

   if (isset($_POST['nome'])) {
       $livro = $conexao->real_escape_string($_POST['nome']);
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Detalhes do Livro</title>
      <!DOCTYPE html>
      <html lang="en">
         <head>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
            <title> Início | Mascarenhas </title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <style>
               @import url('https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap');
               @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=El+Messiri:wght@700&family=Inter&family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap');

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
        font-size: 2rem;
        color: #ffffff;
        cursor: pointer;
    }

    .logoo {
      left:1%;
      position: absolute;
      width:7%;
      top:-5px;
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .sidebar.active {
        right: 0;
    }

    .sidebar a {
        display: flex;
        position: relative;
        top:-18%;
        align-items: center;
        padding: 15px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s, color 0.3s; 
        margin-bottom: -100px; /* Ajuste o valor conforme necessário */
}
    .sidebar-link2 {
        top:-9rem;
        align-items: center;
        
        text-decoration: none;
        color: #333;
        position: relative;
        transition: background-color 0.3s, color 0.3s; 
        margin-bottom: -80px; 
}

    .sidebar a i {
        margin-right: 10px;
    }

    .sidebar a:hover {
        background-color: #ddd;
        color: #666; 
    }


    .logo-area {
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        background-color: #f0f0f0;
        margin-bottom: 20px;
        position: relative;
}

    .logo-area p {
        margin-top: 5px;
        font-weight: bold;
        font-size: 1.6em;
    }

    .logo-area img {
        width: 10px; /* Ajuste o tamanho da imagem conforme necessário */
        height: 10px; /* Ajuste o tamanho da imagem conforme necessário */
        margin-bottom: 10px;
    }

    .sidebar a i {
        margin-right: 10px;
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

               .center-container {
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: center;
               min-height: 100vh; 
               padding: 100px 20px; 
               background-color: #f0f0f0;
               box-sizing: border-box; 
               min-height: 80vh;
               width: 100%;
               }
               #emprestar {
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: center;
               margin-top: 20px;
               }
               input[type="text"],
               input[type="number"],
               input[type="textx"],
               input[type="date"] 
               .text{
               padding: 10px;
               border: none;
               border-radius: 10px;
               background-color: #f0f0f0;
               width: 100%;
               margin: 5px -15px;
               }
               input[type="submit"] {
               padding: 10px 20px;
               border: none;
               border-radius: 10px;
               background-color: #333;
               color: #fff;
               cursor: pointer;
               transition: background-color 0.3s;
               }
               input[type="submit"]:hover {
               background-color: #666;
               }
               .container {
               min-height: 200vh;
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: space-between; 
               background-color: #f0f0f0; 
               padding: 50px; 
               box-sizing: border-box; 
               width: 100%;
               }
     
               .white-background {
               background-color: white;
               padding: 20px;
               border-radius: 10px;
               box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
               margin-top: 20px;
               width: 80%; 
               max-width: 600px; 
               }

               .white-background h1 {
               font-size: 24px;
               margin-bottom: 10px;
               }
               .white-background a {
               text-decoration: none;
               color: #333;
               font-weight: bold;
               font-size: 16px;
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
               footer {
               background-color: #000000;
               color: #fff;
               padding: 25px;
               text-align: center;
               width: 100%;
               position: relative; 
               bottom: 0;
               }
            </style>
   </head>
    </style>
</head>
<body style="background-color:f0f0f0; overflow-x:hidden;">
<nav class="navbar">
        <img src="Imagens/logo.png"class="logoo" >
        <a href="index.php">Início</a>
        <a href="catalogo.php">Acervo</a>
        <a href="clubeLivro.php">Clube do Livro</a>
        <a href="horaLeitura.php">Hora da Leitura</a>
        <a href="rankingLivros.php">Ranking de livros</a>
        <div class="icon-menu white" id="icon-menu">
            <i class="fas fa-bars fa-2xl"></i>
        </div>
    </nav>

<div class="sidebar" id="sidebar">
    <div class="logo-area">
        <p>SHELF</p>
        <div class="separator"></div> 
    </div>
  
    <a href="emprestimo.php"><i class="fas fa-book"></i>ㅤRelatórios</a>
    <a href="livroCadastrar.php"><i class="fas fa-plus-circle"></i>ㅤLivros Novos</a>
    
    <a href="estudantes.php"><i class="fas fa-user-graduate"></i>ㅤEstudantes</a>
    <a href="turmas.php"><i class="fas fa-users"></i>ㅤTurmas</a>
    <a href="multas.php"><i class="fas fa-money-bill"></i>ㅤMultas</a>
    <div class="separator2"></div>
    


        
        <div class="sidebar-link2">
            <a href="logout.php">
                <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>
                ㅤSair da Conta
            </a>
            
        </div>
    </div>
</div>
<div class="center-container">
   <div class="white-background">
    <!--Forms para cadastro-->
    <center>
    <h1  style="font-family: 'Bebas Neue', sans-serif; font-size:40px;">Cadastro dos livros</h1>
    <form method="post" action="livroCadastrarBD.php" id="cadastro" name="cadastro" enctype="multipart/form-data">
        <label class="">Título e subtítulo: </label>
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
        <br><input type="text" id="estante" name="estante" required>
        <br><br><label class="">Prateleira:</label>
        <br><input type="text" id="prateleira" name="prateleira" required>
        <br><br><label class="">Quantidade:</label>
        <br><input type="text" id="qtdLivros" name="qtdLivros" required>

        <br><br><label class="text">Gênero:</label>
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
        <br><br><label class="">Capa:</label>
        <br><input type="file" name="capaLivro" accept="image/*">
    
       
        <br><br><input type="submit" value="Cadastrar">
    </form>
            </center>
            </div>
            </div>


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
            iconMenu.style.right = '270px'; // Ajuste o valor conforme necessário
        } else {
            iconMenu.style.right = '20px'; // Ajuste o valor conforme necessário
        }
    });
});

</script>
</body>
</html>

