
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
               overflow-x:hidden;
               }
               .navbar {
               text-align: center;
               background-color: rgb(0, 0, 0);
               height: 70px;
               overflow-x: hidden;
               position: fixed; 
               width: 100%; 
               z-index: 100; 
               transition: top 0.3s; 
               top: 0; 
               overflow-y:hidden;
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
               overflow-y: hidden;
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
               margin-bottom: -100px; 
               overflow-x: hidden;
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
               width: 10px; 
               height: 10px; 
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
               .sidebar .separator {
               height: 2px;
               width: 100%;
               background-color: #e0e0e0;
               margin: 20px 0;
               }
               .sidebar .separator2{
               height: 2px;
               width: 100%;
               background-color: #e0e0e0;
               margin: 20px 0;
               position:relative;
               top:0rem;
               }
               .sidebar .profile-link {
               margin: auto; 
               padding: 15px;
               background-color: #f0f0f0; 
               display: flex; 
               align-items: center; 
               justify-content: center; 
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
               input[type="date"] {
               padding: 10px;
               border: none;
               border-radius: 10px;
               background-color: #f0f0f0;
               width: 95%;
               margin: 2px -15px;
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
               position: absolute; 
               bottom: 0;
               }
            </style>
   </head>
   <body>
   <body style="background-color: #f0f0f0;">
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
   
   <!-- Formulário de empréstimo -->
   <div class="center-container">
   <div class="white-background">
    <center>
    <h1 style="font-family: 'Bebas Neue', sans-serif; font-size:40px;">Cadastro do Leitor</h1>
    
    <form method="post" action="horaLeituraCadastrarBD.php" id="cadastro" name="cadastro">
        <br><label class="">Nome completo:</label>
        <br><input type="text" id="nome" name="nome" required>
        <br><br><label class="">Turma:</label>
        <br><input type="text" id="turma" name="turma" required>
        <br><br><label class="">Telefone:</label>
        <br><input onkeyup="formatarTelefone()" type="text" id="telefone" name="telefone" required>
        <br><br><label class="">Nome do Livro: </label>
        <br><input type="textx" id="nomeLivro" name="nomeLivro">
        <br><br><label class="">Página Atual: </label>
        <br><input type="number" id="atualPag" name="atualPag">
        
        <br><br><input type="submit" value="Cadastrar">
        </center>
    </form>

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
      document.addEventListener('DOMContentLoaded', function () {
          const livroItems = document.querySelectorAll('.livro-item');
      
          livroItems.forEach(function (livroItem) {
              livroItem.addEventListener('click', function () {
                  const livroId = livroItem.getAttribute('data-id');
                  window.location.href = 'detalhesLivro.php?livro_id=' + livroId;
              });
          });
      });
    });
      
      
   </script>
   </body>
   </html>