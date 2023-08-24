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
    #Cadastro das informações na tabela cadastroturmas.
    $nome = $conexao->real_escape_string($_POST['nome']);
    $turno = $conexao->real_escape_string($_POST['turno']);
    $num_alunos = $conexao->real_escape_string($_POST['num_alunos']);
    $cadastrarTurma = 'INSERT INTO `biblioteca`.`cadastroturmas`(`nome`, `turno`, `num_alunos`)
            VALUES ("' . $nome . '", "' . $turno . '", "' . $num_alunos . '");';
    $resultado = $conexao->query($cadastrarTurma);
    $conexao->close();
    header('Location: turmas.php', true, 301);
    #Cadastro das informações na tabela usuarios.
}
?>