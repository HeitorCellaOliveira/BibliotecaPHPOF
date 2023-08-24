<?php
$hostname = '127.0.0.1';
$user = 'root';
$password = 'root';
$database = 'biblioteca';

$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $emprestimoID = $conexao->real_escape_string($_POST['emprestimoID']);

        // Executar a exclusão do registro de empréstimo
        $sql_delete_emprestimo = "DELETE FROM emprestimos WHERE id = '$emprestimoID'";
        if ($conexao->query($sql_delete_emprestimo) === TRUE) {
            echo "Registro de empréstimo apagado com sucesso.";
            echo "<br><a href='emprestimo.php'>Voltar</a>";
        } else {
            echo "Erro ao apagar registro de empréstimo: " . $conexao->error;
        }
    }
}
?>
