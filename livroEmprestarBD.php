<?php
$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';

date_default_timezone_set('America/Sao_Paulo');

$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $livro = $conexao->real_escape_string($_POST['livroID']);
        $aluno = $conexao->real_escape_string($_POST['estudanteID']);
        $dataEmprestimo = $_POST['dataEmprestimo'];

        // Verifica a disponibilidade do livro
        $sql_check_availability = "SELECT qtdLivros FROM acervo WHERE nome = '$livro'";
        $result = $conexao->query($sql_check_availability);
        $row = $result->fetch_assoc();

        if ($row['qtdLivros'] > 0) {
            // Calcula a data de devolução (7 dias após a data do empréstimo)
            $dataDevolucao = date('Y-m-d', strtotime($dataEmprestimo . ' + 7 days'));

            // Inicia uma transação para garantir que as operações sejam executadas juntas
            $conexao->begin_transaction();

            // Insere o empréstimo na tabela de empréstimos
            $sql_insert_emprestimo = "INSERT INTO emprestimos (livroID, estudanteID, dataEmprestimo, dataDevolucao) 
                VALUES ((SELECT id FROM acervo WHERE nome = '$livro'), (SELECT id FROM cadastroalunos WHERE nMatricula = '$aluno'), '$dataEmprestimo', '$dataDevolucao')";

            if ($conexao->query($sql_insert_emprestimo) === TRUE) {
                // Atualiza a quantidade disponível de livros após o empréstimo
                $sql_update_quantity = "UPDATE acervo SET qtdLivros = qtdLivros - 1 WHERE nome = '$livro'";
                $sql_update_quantity = "UPDATE acervo SET qtdEmprestimo = qtdEmprestimo + 1 WHERE nome = '$livro'";
                if ($conexao->query($sql_update_quantity) === TRUE) {
                    // Confirma a transação
                    $conexao->commit();
                    echo "<script>alert('Livro emprestado com sucesso! Data de Devolução: $dataDevolucao'); window.history.back();</script>";
                } else {
                    // Desfaz a transação em caso de erro
                    $conexao->rollback();
                    echo "Erro ao atualizar a quantidade disponível: " . $conexao->error;
                }
            } else {
                // Desfaz a transação em caso de erro
                $conexao->rollback();
                echo "Erro ao realizar o empréstimo: " . $conexao->error;
            }
        } else {
            echo "O livro não está disponível para empréstimo.";
        }
        echo "<br><br><a href='catalogo.php'>Voltar</a>";
    }
}
?>
