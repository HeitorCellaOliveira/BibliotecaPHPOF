<?php

   #Conexão com o banco de dados.
   $hostname = '127.0.0.1';
   $user = 'root';
   $password = 'root';
   $database = 'biblioteca';
   
   // Inicializa a conexão com o banco de dados
   $conexao = new mysqli($hostname, $user, $password, $database);
   
   // Verifica se ocorreu um erro na conexão
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
      <title>Detalhes do Livro | Mascarenhas</title>
      <!DOCTYPE html>
      <html lang="en">
         <head>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
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
               .center-container {
               display: flex;
               justify-content: center;
               align-items: center;
               height: 100vh;
               margin-top: -100px;
               overflow-x: hidden;
               }
               .book-details {
               overflow: hidden;
               display: flex;
               align-items: center;
               padding: 20px;
               background-color: #f9f9f9;
               border-radius: 10px;
               box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
               max-width: 800px;
               width: 100%;
               margin-top: 100px;
               height: auto;
               overflow-x: hidden;
               }
               .book-image img {
               max-width: 550px;
               height: 450px;
               }
               .book-info {
               margin-left: 25px;
               margin-top: -10px; 

               }
               .book-info h1 {
               font-size: 40px; 
               margin-bottom: 160px; 

               }
               .book-info p {
               position:relative; 
               margin-bottom: 5px;
               top:-100px;
               }
               .btn-emprestar-purple {
               padding: 20px 40px;
               background-color: #3742fa;
               position:absolute;
               margin-top: -50px;
               width: 150px;
               color: white;
               border: none;
               border-radius: 5px;
               font-size: 16px;
               text-align: center;
               cursor: pointer;
               transition: background-color 0.3s, transform 0.3s;
               overflow: hidden; 
               left:54%;
               }
               .btn-emprestar-purple:hover {
               background-color: #000000;
               overflow: hidden; 
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
               margin-top: 0px;
               position: relative;
               overflow-x: hidden;
               }
            </style>
   </head>
   <body style="overflow-x:hidden;">
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
   <a href="livros.php"><i class="fas fa-book-open"></i>ㅤLivros</a>
   <a href="estudantes.php"><i class="fas fa-user-graduate"></i>ㅤEstudantes</a>
   <a href="turmas.php"><i class="fas fa-users"></i>ㅤTurmas</a>
   <a href="multas.php"><i class="fas fa-money-bill"></i>ㅤMultas</a>
   <div class="separator2"></div>
   <div class="sidebar-link2">
   <a href="#">
   <i class="fas fa-user" style="margin-right: 5px;"></i>
   ㅤMeu Perfil
   </a>
   </div>
   <div class="sidebar-link2">
   <a href="logout.php">
   <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>
   ㅤSair da Conta
   </a>
   </div>
   </div>
   </div>
   <div class="content">
   <?php
      if (isset($_GET['livro_id'])) {
          $livro_id = $_GET['livro_id'];
        
          
          if ($conexao->connect_errno) {
              echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
              exit();
          } else {
              $mostrarLivro = "SELECT * FROM `acervo` WHERE id = $livro_id";
              $resultado = $conexao->query($mostrarLivro);
              if ($row = mysqli_fetch_array($resultado)) {
      ?>
   <div class="center-container">
   <div class="book-details">
   <div class="book-image">
   <img src="Imagens/<?php echo $row['capaLivro']; ?>" alt="Book Cover">
   </div>
   <div class="book-info">
   <form method="post" action="livroEmprestar.php">
        <h1><?php echo"<label for='livro
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        '"</h1>
        <p><strong>Autor:</strong> <?php echo $row['autor']; ?></p>
        <p><strong>Editora:</strong> <?php echo $row['editora']; ?></p>
        <p><strong>Ano de Publicação:</strong> <?php echo $row['anoPublicado']; ?></p>
        <p><strong>ISBN:</strong> <?php echo $row['isbn']; ?></p>
        <p><strong>Rua:</strong> <?php echo $row['rua']; ?></p>
        <p><strong>Estante:</strong> <?php echo $row['estante']; ?></p>
        <p><strong>Prateleira:</strong> <?php echo $row['prateleira']; ?></p>
        <p><strong>Gênero:</strong> <?php echo $row['genero']; ?></p>
        <input type="hidden" name="livro_id" value="<?php echo $row['id']; ?>">
        <button class="btn-emprestar btn-emprestar-purple" type="submit" name="emprestar">Emprestar</button>
    </form>
   </div>
   </div>
   </div>
   </div>
   <?php
      } else {
          echo "Livro não encontrado.";
      }
      }
      } else {
      echo "ID do livro não especificado.";
      }
      ?>
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
   <script>
      document.addEventListener('DOMContentLoaded', function () {
          const iconMenu = document.querySelector('#icon-menu');
          const sidebar = document.querySelector('#sidebar');
      
          iconMenu.addEventListener('click', function () {
              sidebar.classList.toggle('active');
              if (sidebar.classList.contains('active')) {
                  iconMenu.style.right = '270px'; 
              } else {
                  iconMenu.style.right = '20px'; 
              }
          });
      });
      $(document).ready(function(){
                  $('.carousel').slick({
                      autoplay: true, 
                      autoplaySpeed: 3000, 
                      slidesToShow: 1, 
                      slidesToScroll: 1, 
                      arrows: false, 
                  });
              });
      document.addEventListener('DOMContentLoaded', function () {
          const livroItems = document.querySelectorAll('.livro-item');
      
          livroItems.forEach(function (livroItem) {
              livroItem.addEventListener('click', function () {
                  const livroId = livroItem.getAttribute('data-id');
                  window.location.href = 'detalhesLivro.php?livro_id=' + livroId;
              });
          });
      });
      
      
   </script>
   </body>
   </html>
   </body>
</html>