<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
      <title>Catálogo | Mascarenhas </title>
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

         .custom-search-box {
         display: flex;
         align-items: center;
         justify-content: center;
         width: 500px;
         margin: 20px auto;
         border: 2px solid black;
         border-radius: 40px;
         background-color: white;
         overflow: hidden;
         position: relative;
         }
         .custom-search-txt {
         border: none;
         background: none;
         outline: none;
         padding: 5px;
         color: black;
         font-size: 16px;
         line-height: 40px;
         background-color: #fff;
         width: 70%;
         }
         .custom-search-btn {
         color: #fff;
         width: 40px;
         height: 40px;
         border-radius: 5px;
         border-left: 1px solid black;
         left: 20%;
         width: 15%;
         justify-content: center;
         align-items: center;
         cursor: pointer;
         background-color: #000000;
         }
         .livro-row {
         display: flex;
         justify-content: center;
         color:#000000;
         position: relative;
         margin-bottom: 10px;
         margin-top: -30px; 
         }
         .livro-item {
         margin: 10px;
         margin-bottom: 20px; 
         padding: 10px;
         color:#000000;
         border: 1px solid #e0e0e0;
         border-radius: 5px;
         transition: transform 0.3s, box-shadow 0.3s;
         text-align: center;
         width: 250px; 
         height: 550px; 
         display: inline-block;
         overflow: hidden;
         cursor:pointer;
         background-color: #fff;
         position: relative;
         z-index: 1;
         }
         .livro-lista {
         margin-top: 10px;
         background-color: #f0f0f0; 
         box-sizing: border-box;
         }
         .livro-item:hover {
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
         color:#000000;
         }
         .emprestar-btn {
         padding: 20px 40px;
         background-color: #3742fa;
         margin-top: 80px;
         color: white;
         border: none;
         border-radius: 5px;
         font-size: 16px;
         cursor: pointer;
         transition: background-color 0.3s, transform 0.3s;
         overflow: hidden; 
         }
         .emprestar-btn:hover {
         background-color: #2c36e2;
         overflow: hidden; 
         }
         .emprestar-btn:focus {
         outline: none;
         overflow: hidden; 
         }
         .livro-titulo {
         margin-top: 10px;
         font-family: Roboto, sans-serif;
         font-size: 1.6em; 
         font-weight: bold; 
         margin-bottom: 10px;
         color: #000000;
         }
         .livro-subtitulo {
         font-family: Roboto, sans-serif;
         font-size: 1.0em; 
         font-weight: bold; 
         color:#666;
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
         margin-top: auto;
         }
      </style>
   </head>
   <body>
      <body style="background-color: #f0f0f0; overflow-x:hidden;">
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
   <div class="carousel">
      <div><img src="Imagens/leialivros.png" alt="Imagem 1"></div>
      <div><img src="Imagens/2.png" alt="Imagem 2"></div>
      <div><img src="Imagens/3.png" alt="Imagem 3"></div>
      <div><img src="Imagens/4.png" alt="Imagem 4"></div>
      <div><img src="Imagens/5.png" alt="Imagem 5"></div>
   </div>
   <div class="search-box">
      <!-- Barra de Pesquisa -->
      <form action="resultadopesquisa.php" method="get">
         <div class="custom-search-box">
            <input class="custom-search-txt" type="text" name="q" placeholder="Pesquisar livro..." />
            <button class="custom-search-btn" type="submit">
            <i class="fas fa-search"></i>
            </button>
         </div>
      </form>
      </form>
   </div>
   </div>
   <div class="livro-lista">
      <div style="height: 160px;"></div>
      <?php

         $hostname = '127.0.0.1';
         $user = 'root';
         $password = 'root';
         $database = 'biblioteca';
         $conexao = new mysqli($hostname, $user, $password, $database);
         
         if ($conexao->connect_errno) {
             echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
             exit();
         } else {
             $mostrarLivros = 'SELECT * FROM `acervo`';
             $resultado = $conexao->query($mostrarLivros);
             $livrosNaLinha = 0;
         
             while ($row = mysqli_fetch_array($resultado)) {
                 if ($livrosNaLinha === 0) {
                     echo '<div class="livro-row">';
                 }
             
                 echo '<div class="livro-item" data-id="' . $row['id'] . '">';
                 echo '<a href="detalhesLivro.php?livro_id=' . $row['id'] . '">';
                 echo '<img src="Imagens/' . $row['capaLivro'] . '" style="width: 200px; height: 300px; object-fit: cover;"><br>';
                 echo '<div class="livro-info">'; 
                 echo '<p class="livro-titulo">' . $row['nome'] . '</p>';
                 echo '<p class="livro-subtitulo">' . $row['autor'] . '</p>';
                 echo '</div>'; 
                 echo '</a>';
                 echo '<form method="post" action="livroEmprestar.php">';
                 echo '<input type="hidden" value="' . $row['nome'] . '" id="nome" name="nome">';
                 echo '<button class="emprestar-btn" type="submit">Emprestar</button>';
                 echo '</form>';
                 echo '</div>';
                 
             
                 $livrosNaLinha++;
            
                 if ($livrosNaLinha === 5) {
                     echo '</div>';
                     $livrosNaLinha = 0;
                 }
                 }
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