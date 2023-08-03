<?php 
include('protect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Acervo | Mascarenhas</title>
</head>
<body>
    <h1>Lista de Livros</h1>
    <?php
        $conn = new mysqli('localhost', 'root', 'root', 'biblioteca');

        // Verifica se ocorreu algum erro na conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta ao banco de dados para obter os livros
        $sql = "SELECT * FROM acervo";
        $result = $conn->query($sql);

        // Verifica se existem registros na tabela
        if ($result->num_rows > 0) {
            // Exibe os livros em uma lista
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<strong>Título:</strong> ' . $row['nome'] . '<br>';
                echo '<strong>Autor:</strong> ' . $row['autor'] . '<br>';
                echo '<strong>Ano de Publicação:</strong> ' . $row['anoPublicado'] . '<br>';
                echo '<strong>Quantidade de Livros: </strong>'. $row['qtdLivros'];
                echo '<br><img src="' . $row['capaLivro'] . '"><br>';
                echo '<a href="livro.php?id=' . $row['id'] . '">Mais Detalhes</a>';
                echo '</li>';
                echo '<a href="index.php">Voltar</a>';
            }
            echo '</ul>';
        } else {
            echo 'Nenhum livro encontrado no banco de dados.';
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    ?>
</body>
</html>
