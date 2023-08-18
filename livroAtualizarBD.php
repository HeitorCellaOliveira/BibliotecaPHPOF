<!--Processo de edição de informações de livro-->
<?php
#Conexão com o banco de dados.
session_start();
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
    $autor = $conexao->real_escape_string($_POST['autor']);
    $editora = $conexao->real_escape_string($_POST['editora']);
    $anoPublicado = $conexao->real_escape_string($_POST['anoPublicado']);
    $nPags = $conexao->real_escape_string($_POST['nPags']);
    $isbn = $conexao->real_escape_string($_POST['isbn']);
    $genero = $conexao->real_escape_string($_POST['genero']);
    $qtdLivros = $conexao->real_escape_string($_POST['qtdLivros']);
    $salvarEdicoes = 'UPDATE `biblioteca`.`acervo`
                SET `nome` = "' . $nome . '",
                `autor` = "' . $autor . '",
                `editora` = "' . $editora . '",
                `anoPublicado` = "' . $anoPublicado . '",
                `nPags` = "' . $nPags . '",
                `isbn` = "' . $isbn . '",
                `genero` = "' . $genero . '",
                `qtdLivros` = "' . $qtdLivros . '"
                WHERE `id`="' . $id . '";';
    $resultado = $conexao->query($salvarEdicoes);
    $conexao->close();
    header('Location: livros.php', true, 301);
    #Alteração das informações modificadas.
}
?>