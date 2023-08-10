<?php
session_start();

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "biblioteca";

$mysqli = mysqli_connect($hostname, $user, $password, $database);

if (isset($_POST['nomeUsuario']) && isset($_POST['senha'])) {
    if (strlen($_POST['nomeUsuario']) == 0) {
        echo "<script> alert('Preencha seu nome de usuário!')</script>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<script> alert('Preencha sua senha!')</script>";
    } else {
        $nomeUsuario = $mysqli->real_escape_string($_POST['nomeUsuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM loginadm WHERE nomeUsuario = '$nomeUsuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];

            header("Location: index.php");
            exit();
        } else {
            echo "<script> alert('Falha ao logar! E-mail ou senha incorretos')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <title>Login | Mascarenhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.4.0/css/all.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Philosopher:ital@1&family=Playfair+Display:wght@600&family=Ysabeau+Infant:ital,wght@1,500&display=swap');


    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        text-transform: none;
        
    }
    body {
            background-color: #5C5C5C; /* Light gray background color */
            margin: 0;
            padding: 0;
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

    
    .ret2{
        height: 600px;
        width:700px ;
        position: absolute;
        left:14%;
        top: 87.3px;
        border-radius: 10px;
        
    }
    .ret{
        height: 600px;
        width:450px ;
        background: #FFFFFF;
        position: absolute;
        left:55%;
        top:175px;
        
        border-radius: 0px 10px 10px 0px;

    }



    footer {
      background-color: rgb(0, 0, 0);
        background-color: #000000;
        color: #fff;
        padding: 25px;
        text-align: center;
        top:827px;
        width: 100%;
        position: fixed; /* Adiciona posição fixa para garantir que o footer fique no rodapé da página */
        bottom: 0; /* Posiciona o footer na parte inferior da página */
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

    .tittle{
        color:#000000;
        font-size:50px;
        font-family: 'Playfair Display', serif;
        position: absolute;
        top:75px;
        left:75px;
    }
    #user{
        position: absolute;
        top: 210px; 
        left: 35px; 
        font-size: 24px;
        color:;
        z-index: 1;
    }


    #nomeUsuario{
    position: absolute;
	width:360px;
	height:40px;
    border-radius: 20px;
    margin-bottom: 20px;
    padding-left: 45px;
    top:200px;
    left:20px;

    }
    #user2{
    position: absolute;
    top: 290px; 
    left: 35px; 
    font-size: 24px;
    color:;
    z-index: 1;

    }
    #senha{
    position: absolute;
	width:360px;
	height:40px;
    top:280px;
    left:20px;
    border-radius: 20px;
    margin-bottom: 20px;
    padding-left: 45px;

    }

    .button {
    font-size:20px;
    font-family:'Bebas', serif;
    outline:none;
    height: 50px;
    text-align: center;
    width: 250px;
    border-radius:40px;
    background: #fff;
    border: 4px solid $green;
    color:$green;
    letter-spacing:1px;
    text-shadow:0;
    font-size:12px;
    weight:bold;
    position: relative;
    top:100px;
    left:0%;
    text-decoration:bold;
  }
  .naopossui{
    color:#000000;
    position:absolute;
    font-family: 'Bebas Neue', sans-serif;
    top:330px;
    font-size:13px;
    left:65%;
  }
 

    </style>
</head>
<body>
    <nav class="navbar">
            <img src="Imagens/logo.png" class="logo">
            </div>
    </nav>
    <center>
 

    <div class="ret2">
        <img src="Imagens/black.png" class="ret2">
    </div>
    <div class="ret">
    


    
        <center>
        <form method="post" action="">
        <table style="margin-top: 20em;">
            <tr>
                <td><p class="tittle">Login</p></td>
            </tr>
            <i class="fa-solid fa-user" id="user"></i>
            
            <tr>
                <td><input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Digite o usuário" required></td>
            </tr>

            <i class="fa-solid fa-lock" id="user2"></i>
            <tr> 
                <td><input type="password" name="senha" id="senha" placeholder="Digite a senha" required></td>
            </tr>

            <tr>
                <td><br><input type="submit" value="Entrar" style="cursor: pointer;" class="button">
                
                <a href="cadastroPage.php" class="naopossui">Não possui conta?</a></td>
            </tr>
            
        </table>
        </form>
    </center>
    </div>

</body>
</html>