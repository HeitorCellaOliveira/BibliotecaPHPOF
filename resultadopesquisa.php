<?php
// Verificar se o parâmetro "q" (termo de pesquisa) foi recebido via GET
if (isset($_GET['q'])) {
    $termo_pesquisa = $_GET['q'];

    // Conexão com o banco de dados
    $hostname = '127.0.0.1';
    $user = 'root';
    $password = '';
    $database = 'biblioteca';
    $conexao = new mysqli($hostname, $user, $password, $database);

    if ($conexao->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
        exit();
    } else {
        // Consulta SQL para buscar livros com base no termo de pesquisa
        $consulta = "SELECT * FROM `acervo` WHERE `nome` LIKE '%$termo_pesquisa%'";
        $resultado = $conexao->query($consulta);

        // Exibir resultados da pesquisa
        while ($row = mysqli_fetch_array($resultado)) {
            echo "<div class='livro-item'>";
            echo "<a href='detalhesLivro.php?livro_id=" . $row['id'] . "'>";
            echo "<img src='Imagens/" . $row['capaLivro'] . "' style='width: 100px;'><br>";
            echo "<p class='livro-titulo'>" . $row['nome'] . "</p>";
            echo "<p class='livro-subtitulo'>" . $row['autor'] . "</p>";
            echo "</a>";
            echo "</div>";
        }

        // Fechar a conexão com o banco de dados
        $conexao->close();
    }
}
?>
