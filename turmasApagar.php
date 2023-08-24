<!--Processo de apagar aluno-->
<?php
include('protect.php');

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
    #Processo de apagar aluno.
    $id = $conexao->real_escape_string($_POST['id']);
    $apagar = 'DELETE FROM `cadastroturmas` WHERE `id` = "' . $id . '"';
    $resultado = $conexao->query($apagar);
    $conexao->close();
    header('Location: turmas.php', true, 301);
    #Processo de apagar aluno.
}
?>