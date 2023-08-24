<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emprestimo_id = $_POST['emprestimoID'];

    # Conexão com o banco de dados (substitua pelas suas configurações)
    $hostname = '127.0.0.1';
    $user = 'root';
    $password = 'root';
    $database = 'biblioteca';
    $conexao = new mysqli($hostname, $user, $password, $database);

    # Verificar a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    # Consulta para prolongar a data de devolução
    $prolongar_sql = "UPDATE emprestimos SET dataDevolucao = DATE_ADD(dataDevolucao, INTERVAL 7 DAY) WHERE id = $emprestimo_id";

    if ($conexao->query($prolongar_sql) === TRUE) {
        echo "Empréstimo prolongado com sucesso!";
    } else {
        echo "Erro ao prolongar empréstimo: " . $conexao->error;
    }

    # Fechar a conexão
    $conexao->close();
}
?>
