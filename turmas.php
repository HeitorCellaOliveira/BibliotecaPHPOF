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
    <title> Turmas | Mascarenhas </title>
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
        padding-right: 100px;
        }

    .center-container {
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: center;
               min-height: 100vh; 
               padding: 100px 20px; 
               
               box-sizing: border-box; 
               min-height: 80vh;
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
.cad{
    padding: 10px 20px;
        border: none;
        border-radius: 10px;
        background-color: #333;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
}
.cad:hover{
    background-color: #666;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
}

th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f0f0f0;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
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

    /* Estilo para a linha cinza claro dentro da sidebar */
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

    /* Estilo para a aba Meu Perfil */
    .sidebar .profile-link {
        margin: auto; 
        padding: 15px;
        background-color: #f0f0f0; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
    }
    </style>
</head>
<body style=background-color:#f0f0f0;>
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
    <h1  style="font-family: 'Bebas Neue', sans-serif; font-size:40px;">Turmas</h1>
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
    $mostrarTurmas = 'SELECT * FROM `cadastroturmas`';
    $resultado = $conexao->query($mostrarTurmas);
    echo '<div class="custom-search-box">';
    echo '<input type="text" id="pesquisa" class="custom-search-txt" onkeyup="showHint(this.value)" placeholder="Pesquise por nome">';
    echo '</div>';

    echo '<span id="txtHint"></span>';
    echo '<script>
    function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "turmasPesquisar.php?turmaPesquisada=" + str, true);
    xhttp.send();
}
</script>';

    echo "<form method='post' action='turmasCadastrar.php'>
    <input type='submit' value='Cadastrar Turmas' class='submit' style='margin-top: 60px;'>
  </form>";
    
    echo '<table>';
    echo '<tr><th>Nome</th><th>Turno</th><th>Nº de Alunos (max)</th><th>Editar</th></tr>';
    
    while ($row = mysqli_fetch_array($resultado)) {
        echo '<tr>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '<td>' . $row['turno'] . '</td>';
        echo '<td>' . $row['num_alunos'] . '</td>';
        echo '<td>';
        echo "<form method='post' action='turmasAtualizar.php'>
                <input type='hidden' value='". $row['id'] ."' id='id' name='id'>
                <input type='submit' value='Editar'>
              </form>";
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
    
}    
?>
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