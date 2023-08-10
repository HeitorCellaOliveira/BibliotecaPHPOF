<!--Processo de cadastro de alunos-->
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
    #Cadastro das informações na tabela usuarios.
    $nome = $conexao->real_escape_string($_POST['nome']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $turma = $conexao->real_escape_string($_POST['turma']);
    $nMatricula = $conexao->real_escape_string($_POST['nMatricula']);
    $cadastrarAluno = 'INSERT INTO `biblioteca`.`cadastroalunos`(`nome`, `endereco`, `telefone`, `turma`, `nMatricula`)
            VALUES ("' . $nome . '", "' . $endereco . '", "' . $telefone . '", "' . $turma . '", "'. $nMatricula . '");';
    $resultado = $conexao->query($cadastrarAluno);
    $conexao->close();
    header('Location: estudantes.php', true, 301);
    #Cadastro das informações na tabela usuarios.
}
?>