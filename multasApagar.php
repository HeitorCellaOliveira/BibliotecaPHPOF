<?php
$emprestimoID = $_GET['emprestimoID'];

$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';

$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
} else {
    $sql_apagar_multa = "UPDATE devolucoes SET multaPaga = 0 WHERE emprestimoID = $emprestimoID";
    
    if ($conexao->query($sql_apagar_multa) === true) {
        echo "Multa apagada com sucesso.";
        echo "<br><br><a href='multas.php'>Voltar</a>";
    } else {
        echo "Erro ao apagar multa: " . $conexao->error;
    }
}

$conexao->close();
?>
