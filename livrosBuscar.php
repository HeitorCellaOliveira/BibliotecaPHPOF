<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php

    $hostname = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "biblioteca";

    $conexao = new mysqli($hostname, $user, $password, $database);

    if ($conexao -> connect_errno) {
        echo "Falha ao conectar com o Banco de Dados: " . $conexao -> connect_error;
        exit();
    } else {
        $nome = $conexao -> real_escape_string($_POST['buscarLivros']);
    }

    $sql = "SELECT * FROM `acervo` WHERE `nome` LIKE '%".$nome."%';";

    $resultado = $conexao -> query($sql);

    if ($resultado -> num_rows !=0) {
        while ($row = mysqli_fetch_array($resultado)) {
            echo 'ID: ' . $row["id"];
            echo '<br>';
            echo 'Nome: ' . $row["nome"];
            echo '<br>';
            echo 'Gênero: ' . $row["genero"];
            echo '<br>';
            echo 'Autor: ' . $row["autor"];
            echo '<br>';
            echo 'Ano de Publicação:' . $row["anoPublicado"];
            echo '<br>';
            echo 'Sinopse: ' . $row["sinopse"];
            echo '<br>';
            echo 'Quantidade de Livros:'. $row["qtdLivros"];
            echo '<br>';
            echo 'Data de Entrada:' . $row["dataEntrada"];
            echo '<form action="livroApagar.php" method="POST">';
            echo '<input type="hidden" value="'.$row["id"].'" name="deletar"  />';
            echo '<br>';
            echo '<input type="submit" value="Deletar" onclick="return confirm(\'Tem certeza de que deseja deletar o Livro?\')">';
            echo '</form>';

        }
        $conexao -> close();
        echo '<a href="buscarLivro.php" style="">Voltar</a>';
        exit();
    } else {
        $conexao -> close();
        echo 'Nenhum registro encontrado.';
        echo '<br><br>';
        echo '<a href="buscarLivro.php" style="">Voltar</a>';
    }

?>
</body>
</html>