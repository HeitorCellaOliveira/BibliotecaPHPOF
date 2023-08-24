<!--Processo de edição de informações de aluno-->
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
    #Alteração das informações modificadas.
    $id = $conexao->real_escape_string($_POST['id']);
    $nome = $conexao->real_escape_string($_POST['nome']);
    $turno = $conexao->real_escape_string($_POST['turno']);
    $num_alunos = $conexao->real_escape_string($_POST['num_alunos']);
    $selecionarLeitor = 'SELECT * FROM `cadastroturmas` WHERE `id` = "' . $id . '";';
    $resultado = $conexao->query($selecionarLeitor);
    $salvarEdicoes = 'UPDATE `biblioteca`.`cadastroturmas`
                SET `nome` = "' . $nome . '",
                `turno` = "' . $turno . '",
                `num_alunos` = "' . $num_alunos . '"
                WHERE `id`="' . $id . '";';
    $resultado = $conexao->query($salvarEdicoes);
    $conexao->close();
    header('Location: turmas.php', true, 301);
    #Alteração das informações modificadas.
}
?>