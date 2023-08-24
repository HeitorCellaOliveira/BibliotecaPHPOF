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
<body>
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
    <a href="multas.php"><i class="fas fa-money-bill"></i>Multas</a>
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
<h1>Multas</h1>

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
    $sql_multas = "SELECT d.emprestimoID, d.dataDevolucao, d.multaPaga, e.estudanteID 
                   FROM devolucoes d
                   INNER JOIN emprestimos e ON d.emprestimoID = e.id";
    
    $result_multas = $conexao->query($sql_multas);

    if ($result_multas === false) {
        echo "Erro na consulta SQL das multas: " . $conexao->error;
    } else {
        while ($row_multa = $result_multas->fetch_assoc()) {
            echo "Empréstimo ID: " . $row_multa['emprestimoID'] . "<br>";
            echo "Data de Devolução: " . $row_multa['dataDevolucao'] . "<br>";
            echo "Multa (R$): " . number_format($row_multa['multaPaga'], 2, ',', '.') . "<br>";
            
            // Consulta para buscar o nome e número de matrícula do estudante associado ao empréstimo
            $sql_estudante = "SELECT nome, nMatricula FROM cadastroalunos WHERE id = ?";
            $stmt = $conexao->prepare($sql_estudante);
            $stmt->bind_param("i", $row_multa['estudanteID']);
            $stmt->execute();
            $result_estudante = $stmt->get_result();
            
            if ($result_estudante->num_rows > 0) {
                $estudante = $result_estudante->fetch_assoc();
                echo "Nome do Estudante: " . $estudante['nome'] . "<br>";
                echo "Número de Matrícula: " . $estudante['nMatricula'] . "<br>";
            } else {
                echo "Estudante não encontrado.";
            }
            
            if ($row_multa['multaPaga'] > 0) {
                echo "<button onclick='apagarMulta(" . $row_multa['emprestimoID'] . ")'>Multa Paga</button>";
                echo "<br><br><a href='index.php'>Voltar</a>";
            } else {
                echo "Multa paga.";
            }
            
            echo "<br><hr>"; // Adiciona uma linha horizontal para separar as multas
        }
    }
}
?>


<script>
function apagarMulta(emprestimoID) {
    if (confirm("Tem certeza de que deseja apagar esta multa?")) {
        window.location.href = "multasApagar.php?emprestimoID=" + emprestimoID;
    }
}
</script>
</body>
</html>
