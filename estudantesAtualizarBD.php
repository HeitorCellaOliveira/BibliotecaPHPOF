<!--Processo de edição de informações de aluno-->
<?php
#Conexão com o banco de dados.
session_start();
$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';
$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
    #Conexão com o banco de dados.
} else {
    #Alteração das informações modificadas.
    $id = $conexao->real_escape_string($_POST['id']);
    $nome = $conexao->real_escape_string($_POST['nome']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);
    $turma = $conexao->real_escape_string($_POST['turma']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $selecionarUsuario = 'SELECT * FROM `cadastroalunos` WHERE `id` = "' . $id . '";';
    $resultado = $conexao->query($selecionarUsuario);
    $salvarEdicoes = 'UPDATE `biblioteca`.`cadastroalunos`
                SET `nome` = "' . $nome . '",
                `endereco` = "' . $endereco . '",
                `turma` = "' . $turma . '",
                `telefone` = "' . $telefone . '"
                WHERE `id`="' . $id . '";';
    $resultado = $conexao->query($salvarEdicoes);
    $conexao->close();
    header('Location: estudantes.php', true, 301);
    #Alteração das informações modificadas.
}
?>