<?php
include('protect.php');

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

$usuario = 'root';
$senha = 'root';
$database = 'biblioteca';
$hostname = 'localhost';

$conexao = new mysqli($hostname, $usuario, $senha, $database);

if ($conexao->connect_error) {
    echo "Falha ao conectar com o MySQL: " . $conexao->connect_error;
    exit();
} else {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $turma = $conexao->real_escape_string($_POST['turma']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);

    $sql = "INSERT INTO `biblioteca` . `cadastroalunos` (`nome`, `turma`, `telefone`) VALUES ('$nome', '$turma', '$telefone');";

    $resultado = $conexao->query($sql);

    header('Location: cadastroAlunos.php?mensagem=cadastro', true, 301);
}
?>
