<!--Processo de cadastro de alunos-->
<?php
include('protect.php');

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
    #Cadastro das informações na tabela usuarios.
    $nome = $conexao->real_escape_string($_POST['nome']);
    $turma = $conexao->real_escape_string($_POST['turma']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $nomeLivro = $conexao->real_escape_string($_POST['nomeLivro']);
    $atualPag = $conexao->real_escape_string($_POST['atualPag']);
    $cadastrarAluno = 'INSERT INTO `biblioteca`.`horaleitura`(`nome`, `turma`, `telefone`, `nomeLivro`, `atualPag`)
            VALUES ("' . $nome . '", "' . $turma . '", "' . $telefone . '", "' . $nomeLivro . '", "'. $atualPag . '");';
    $resultado = $conexao->query($cadastrarAluno);
    $conexao->close();
    
    header('Location: horaLeitura.php', true, 301);
    #Cadastro das informações na tabela usuarios.
}
?>