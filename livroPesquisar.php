<!--Pesquisa de livro-->
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
    #Busca de informações de livro através de seu título.
    $nome = $_GET['nomePesquisado'];
    $pesquisa = "SELECT * FROM `livros` 
    WHERE `nome` 
    LIKE '%" . $nome . "%'
    OR `autor` 
    LIKE '%" . $nome . "%'
    OR `genero`
    LIKE '%" . $nome . "%';";
    $resultado = $conexao->query($pesquisa);
    #Busca de informações de livro através de seu título.
    #Form para a função de editar informações de livros.
    if ($resultado->num_rows != 0) {
        $row = $resultado->fetch_array();
        echo "<br><br><table style='width: 20%;'>
                <tr>
                    <td style='width: 40%;'>
                        <img src='Imagens/" . $row['capaLivro'] . "' style='width: 100%'>  
                    </td>
                    <td>
                    Título: " . $row['nome'] . "<br>Autor: " . $row['autor'] . "<br>Editora: " . $row['editora'] . "<br>Ano Publicado: " . $row['anoPublicado'] . "<br>ISBN: " . $row['isbn'] . "<br>CDD: " . $row['cdd'] . "<br>CDU: " . $row['cdu'] . "<br>Gênero: " . $row['genero'] . "<br>Quantidade disponível: " . $row['qtdLivros'] . '<br>Quantidade emprestada: ' . $row['qtdEmprestimo'] . '
                    </td>
                </tr>
            </table>';
        #Form para a função de editar informações de livros.
        echo "<form method='post' action='livroAtualizar.php'>
                    <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                    <input type='submit' value='Editar'>
                    </form>";
        #Form para a função de editar informações de livros.
        #Form para a função de emprestar livros.
        echo "<br><form method='post' action='livroEmprestar.php'>
        <input type='hidden' value='" . $row['nome'] . "' id='nome' name='nome'>
        <input type='submit' value='Emprestar'>
        </form>";
        #Form para a função de emprestar livros.
    }
    $conexao->close();
    exit();
}
?>