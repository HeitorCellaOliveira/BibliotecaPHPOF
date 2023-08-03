<!--Processo de cadastro de livros-->
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
    exit();
    #Conexão com o banco de dados.
} else {
    #Cadastro das informações na tabela livros.
    $titulo = $conexao->real_escape_string($_POST['titulo']);
    $autor = $conexao->real_escape_string($_POST['autor']);
    $editora = $conexao->real_escape_string($_POST['editora']);
    $anoPublicado = $conexao->real_escape_string($_POST['anoPublicado']);
    $npags = $conexao->real_escape_string($_POST['npags']);
    $isbn = $conexao->real_escape_string($_POST['isbn']);
    $cdd = $conexao->real_escape_string($_POST['cdd']);
    $cdu = $conexao->real_escape_string($_POST['cdu']);
    $genero = $conexao->real_escape_string($_POST['genero']);
    $quantidade = $conexao->real_escape_string($_POST['quantidade']);
    #Salvar capaLivro do livro na pasta "Imagens" e no banco de dados.
    if (isset($_FILES['capaLivro'])) {
        $extensao = strtolower(substr($_FILES['capaLivro']['name'], -4));
        $arquivo = date("Y.m.d-H.i.s") . $extensao;
        $diretorio = './Imagens/';
        move_uploaded_file($_FILES['capaLivro']['tmp_name'], $diretorio . $arquivo);
    }
    #Salvar capaLivro do livro na pasta "Imagens" e no banco de dados.
    $cadastrarLivro = 'INSERT INTO `biblioteca`.`livros`(`titulo`, `autor`, `editora`, `ano`, `npags`, `isbn`, `cdd`, `cdu`, `genero`, `quantidadeDisponivel`, `quantidadeEmprestada`, `imagem`)
            VALUES ("' . $titulo . '", "' . $autor . '", "' . $editora . '", "' . $anoPublicado . '", "' . $npags . '", "' . $isbn . '", "' . $cdd . '", "' . $cdu . '", "' . $genero . '", "' . $quantidade . '", "0","'.$arquivo.'");';
    $resultado = $conexao->query($cadastrarLivro);
    $conexao->close();
    //header('Location: catalogo.php', true, 301);
    var_dump($sql);
    #Cadastro das informações na tabela livros.
}
?>