<!--Processo de edição de informações de aluno-->
<?php
#Conexão com o banco de dados.
$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';
$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
    #Conexão com o banco de dados.
} else {
    #Alteração das informações modificadas.
    $id = $conexao->real_escape_string($_POST['id']);
    $nome = $conexao->real_escape_string($_POST['nome']);
    $turma = $conexao->real_escape_string($_POST['turma']);
    $nomeLivro = $conexao->real_escape_string($_POST['nomeLivro']);
    $atualPag = $conexao->real_escape_string($_POST['atualPag']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $selecionarLeitor = 'SELECT * FROM `clubelivro` WHERE `id` = "' . $id . '";';
    $resultado = $conexao->query($selecionarLeitor);
    $salvarEdicoes = 'UPDATE `biblioteca`.`clubelivro`
                SET `nome` = "' . $nome . '",
                `turma` = "' . $turma . '",
                `nomeLivro` = "' . $nomeLivro . '",
                `atualPag` = "' . $atualPag . '",
                `telefone` = "' . $telefone . '"
                WHERE `id`="' . $id . '";';
    $resultado = $conexao->query($salvarEdicoes);
    $conexao->close();
    header('Location: clubeLivro.php', true, 301);
    #Alteração das informações modificadas.
}
?>