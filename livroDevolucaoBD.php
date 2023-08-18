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
        $nMatricula = $conexao->real_escape_string($_POST['nMatricula']);
        $livroNome = $conexao->real_escape_string($_POST['livroNome']);

        // Verifica se o aluno existe
        $sql_check_aluno = "SELECT id FROM cadastroalunos WHERE nMatricula = '$nMatricula'";
        $result_aluno = $conexao->query($sql_check_aluno);

        if ($result_aluno === false) {
            echo "Erro na consulta SQL do aluno: " . $conexao->error;
        } elseif ($result_aluno->num_rows === 0) {
            echo "Aluno não encontrado.";
        } else {
            // Verifica se o livro existe
            $sql_check_livro = "SELECT id, qtdLivros FROM acervo WHERE nome = '$livroNome'";
            $result_livro = $conexao->query($sql_check_livro);

            if ($result_livro === false) {
                echo "Erro na consulta SQL do livro: " . $conexao->error;
            } elseif ($result_livro->num_rows === 0) {
                echo "Livro não encontrado.";
            } else {
                $row_livro = $result_livro->fetch_assoc();
                $livroID = $row_livro['id'];

                // Encontra o empréstimo não devolvido correspondente
                $sql_find_emprestimo = "SELECT id, dataEmprestimo FROM emprestimos WHERE estudanteID = 
                    (SELECT id FROM cadastroalunos WHERE nMatricula = '$nMatricula') AND livroID = '$livroID' AND devolvido = 0";

                $result_emprestimo = $conexao->query($sql_find_emprestimo);

                if ($result_emprestimo === false) {
                    echo "Erro na consulta SQL do empréstimo: " . $conexao->error;
                } elseif ($result_emprestimo->num_rows === 0) {
                    echo "Empréstimo não encontrado ou já devolvido.";
                    header("Location: emprestimo.php");
                } else {
                    $row_emprestimo = $result_emprestimo->fetch_assoc();
                    $emprestimoID = $row_emprestimo['id'];
                    $dataEmprestimo = $row_emprestimo['dataEmprestimo'];

                    // Calcula a data de devolução e multa (se houver)
                    $dataDevolucao = date('Y-m-d', strtotime($dataEmprestimo . ' + 7 days'));
                    $multaPaga = 0;

                    // Calcula a multa se a devolução estiver atrasada
                    $dataAtual = date('Y-m-d');
                    if ($dataAtual > $dataDevolucao) {
                        $diasAtraso = (strtotime($dataAtual) - strtotime($dataDevolucao)) / (60 * 60 * 24);
                        $multaPaga = $diasAtraso * 2; // R$2,00 por dia de atraso
                    }

                    // Insere a devolução na tabela de devoluções
                    $sql_insert_devolucao = "INSERT INTO devolucoes (emprestimoID, dataDevolucao, multaPaga) 
                        VALUES ('$emprestimoID', '$dataDevolucao', '$multaPaga')";

                    if ($conexao->query($sql_insert_devolucao) === TRUE) {
                        // Atualiza o status do empréstimo para devolvido
                        $sql_update_emprestimo = "UPDATE emprestimos SET devolvido = 1 WHERE id = '$emprestimoID'";
                        if ($conexao->query($sql_update_emprestimo) === TRUE) {
                            // Aumenta a quantidade disponível de livros após devolução
                            $sql_update_quantity = "UPDATE acervo SET qtdLivros = qtdLivros + 1 WHERE id = '$livroID'";
                            if ($conexao->query($sql_update_quantity) === TRUE) {
                                echo "Devolução realizada com sucesso! O valor da multa é de: R$" . number_format($multaPaga, 2, ',', '.');
                               
                            } else {
                                echo "Erro ao atualizar a quantidade disponível: " . $conexao->error;
                                
                            }
                        } else {
                            echo "Erro ao atualizar o status do empréstimo: " . $conexao->error;
                        }
                    } else {
                        echo "Erro ao registrar a devolução: " . $conexao->error;
                    }
                }
            }
        }
    }
}
?>
