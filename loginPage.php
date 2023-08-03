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
    <link rel="stylesheet" href="/CSS/main.css">
    <title>Login | Mascarenhas</title>
</head>
<body>
    <center>
        <form method="post" action="">
        <table style="margin-top: 20em;">
            <tr>
                <td><h1>Acesse sua conta!</h1></td>
            </tr>

            <tr>
                <td><label for="">Nome de Usuário:</label></td>
            </tr>

            <tr>
                <td><input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Digite o usuário"></td>
            </tr>

            <tr>
                <td><br><label for="">Senha:</label></td>
            </tr>

            <tr> 
                <td><input type="password" name="senha" id="senha" placeholder="Digite a senha"></td>
            </tr>

            <tr>
                <td><br><input type="submit" value="Entrar" style="cursor: pointer;"><a href="cadastroPage.php" class="">Não possui conta?</a></td>
            </tr>
        </table>
        </form>
    </center>
</body>
</html>
