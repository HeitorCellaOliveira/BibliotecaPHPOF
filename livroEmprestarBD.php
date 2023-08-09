<!--Processo de emprestar livro-->
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
    #Conexão com o banco de dados.
} else {
    $livro = $conexao->real_escape_string($_POST['livro']);
    $telefone = $conexao->real_escape_string($_POST['aluno']);
    $dataEmprestimo = date('Y-m-d');
    $dataDevolucao = date('Y-m-d', strtotime($dataDevolucao . '+7 days'));
    $buscarUsuario = 'SELECT * FROM `cadastroalunos`
            WHERE `telefone` = "' . $telefone . '"';
    $resultado1 = $conexao->query($buscarUsuario);
    $buscarCapa = 'SELECT * FROM `acervo`
        WHERE `nome` = "'.$livro.'"';
    $resultado2 = $conexao->query($buscarCapa);
    if ($resultado1->num_rows != 0) {
        $row1 = $resultado1->fetch_array();
        if($resultado2->num_rows !=0){
            $row2 = $resultado2->fetch_array();
            $emprestar = 'INSERT INTO `biblioteca`.`emprestimos`(`aluno`, `livro`, `dataEmprestimo`, `dataDevolucao`, `capaLivro`)
            VALUES ("' . $aluno . '", "' . $livro . '", "' . $dataEmprestimo . '", "' . $dataDevolucao . '", "'.$row6['capaLivro'].'");';
            $resultado3 = $conexao->query($emprestar);
        $conexao->close();
        header('Location: emprestimo.php', true, 301);
    }
    } else {
        $conexao->close();
        header('Location: livros.php', true, 301);
    }
}
?>