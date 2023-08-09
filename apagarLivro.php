<!--Processo de apagar livro-->
<?php
#Conexão com o banco de dados.
session_start();
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
    #Processo de apagar livro.
    $id = $conexao->real_escape_string($_POST['id']);
    $apagar = 'DELETE FROM `acervo` WHERE `id` = "' . $id . '"';
    $resultado = $conexao->query($apagar);
    $conexao->close();
    header('Location: livros.php', true, 301);
    #Processo de apagar livro.
}
?>