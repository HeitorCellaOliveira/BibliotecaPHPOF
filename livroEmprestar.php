<!--Página de emprestar livro-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Empréstimo | Mascarenhas</title>
    <link rel="stylesheet" href="">

    <script>
    function formatarTelefone() {
    var telefone = document.getElementById('telefone');
    var valor = telefone.value;

    // Remove todos os caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Verifica se o número possui 11 dígitos (com DDD)
    if (valor.length === 11) {
        valor = valor.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, '($1) $2 $3-$4');
    }
    // Verifica se o número possui 10 dígitos (sem DDD)
    else if (valor.length === 10) {
        valor = valor.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
    }

    telefone.value = valor;
    }
    </script>
</head>

<body>
    <h1>Emprestar livros</h1>
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
        #Formulário para empréstimo de livro.
        $livro = $conexao->real_escape_string($_POST['nome']);
        echo 'Livro selecionado: ' . $livro;
        echo '<form method="post" action="livroEmprestarBD.php" id="emprestar" name="emprestar">
        <br><label class="">Telefone do Estudante: </label>
        <br><input onkeyup="formatarTelefone()" type="text" id="aluno" name="aluno" required>
        <br><br><label class="">Data do Empréstimo: </label>
        <br><input type="date" name="dataEmprestimo" id="dataEmprestimo">
        <input type="hidden" value="' . $livro . '" id="livro" name="livro">
        <br><br><input type="submit" value="Emprestar">
        </form>';
        #Formulário para empréstimo de livro.
    }
    ?>
    <!--Retornar a página anterior-->
    <br><a href='livros.php'>Voltar</a>
    <!--Retornar a página anterior-->
</body>

</html>