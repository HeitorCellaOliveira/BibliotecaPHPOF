<?php

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
    $nomeUsuario = $conexao->real_escape_string($_POST['nomeUsuario']);
    $senha = $conexao->real_escape_string($_POST['senha']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);

    $sql = "INSERT INTO `biblioteca` . `loginadm` (`nomeUsuario`, `senha`, `telefone`) VALUES ('$nomeUsuario', '$senha', '$telefone');";

    $resultado = $conexao->query($sql);

    header('Location: loginPage.php', true, 301);
    //var_dump($sql);
}
?>
