<?php
# Conexão com o banco de dados.
session_start();
$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';
$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
} else {
    # Busca de informações de empréstimo através de título de livro.
    $emprestimo = $_GET['emprestimoPesquisado'];
    $pesquisa = "SELECT emprestimos.*, cadastroalunos.nome AS alunoNome, acervo.nome AS livroNome FROM `emprestimos`
                 JOIN cadastroalunos ON emprestimos.estudanteID = cadastroalunos.id
                 JOIN acervo ON emprestimos.livroID = acervo.id
                 WHERE acervo.nome LIKE '%$emprestimo%' OR cadastroalunos.nome LIKE '%$emprestimo%'";
    
    $resultado = $conexao->query($pesquisa);
    
    if ($resultado->num_rows != 0) {
        while ($row = $resultado->fetch_array()) {
            echo "<table style='width: 20%; margin-top: 20px;'>";
            echo "<tr><td>Aluno: " . $row['alunoNome'] . "</td></tr>";
            echo "<tr><td>Livro: " . $row['livroNome'] . "</td></tr>";
            echo "<tr><td>Data emprestado: " . date('d-m-Y', strtotime($row['dataEmprestimo'])) . "</td></tr>";
            echo "<tr><td>Data de entrega: " . date('d-m-Y', strtotime($row['dataDevolucao'])) . "</td></tr>";
            echo "<tr><td>
                      <form method='post' action='livroDevolucaoBD.php'>
                        <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                        <input type='submit' value='Devolver'>
                      </form>
                  </td></tr>";
            echo "</table>";
        }
    } else {
        echo "<p>Nenhum empréstimo encontrado.</p>";
    }
    
    $conexao->close();
    exit();
}
?>
