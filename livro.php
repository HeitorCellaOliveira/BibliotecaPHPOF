<!DOCTYPE html>
<html>
<head>
    <title>Livros | Mascarenhas</title>
</head>
<body>
    <h1>Sinopse do Livro</h1>
    <?php
        // Conexão com o banco de dados (substitua 'seu_usuario', 'sua_senha' e 'seu_banco' pelos seus dados)
        $conn = new mysqli('localhost', 'root', 'root', 'biblioteca');

        // Verifica se ocorreu algum erro na conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Verifica se foi fornecido um ID válido na URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];

            // Consulta ao banco de dados para obter as informações do livro
            $sql = "SELECT * FROM acervo WHERE id = $id";
            $result = $conn->query($sql);

            // Verifica se o livro existe no banco de dados
            if ($result->num_rows > 0) {
                $livro = $result->fetch_assoc();

                // Exibe as informações do livro
                echo '<strong>Título:</strong> ' . $livro['nome'] . '<br>';
                echo '<strong>Autor:</strong> ' . $livro['autor'] . '<br>';
                echo '<strong>Ano de Publicação:</strong> ' . $livro['anoPublicado'];
                echo '<br><strong>Quantidade de Livros:</strong<br>' . $livro['qtdLivros'];
                echo '<br><img src="' . $livro['capaLivro'] . '">';
                echo '<br><strong>Sinopse:</strong><br>' . $livro['sinopse'];
                echo '<br><a href="catalogo.php">Voltar</a>';
            } else {
                echo 'Livro não encontrado no banco de dados.';
            }
        } else {
            echo 'ID do livro inválido.';
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    ?>
</body>
</html>
