<!--Pesquisa de empréstimo-->
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
    #Busca de informações de empréstimo através de título de livro.
    $emprestimo = $_GET['emprestimoPesquisado'];
    $pesquisa = "SELECT * FROM `emprestimos` 
    WHERE `livro` 
    LIKE '%" . $emprestimo . "%'
    OR `aluno` 
    LIKE '%" . $emprestimo . "%';";
    $resultado = $conexao->query($pesquisa);
    if ($resultado->num_rows != 0) {
        $row = $resultado->fetch_array();
        echo "<br><br><table style='width: 20%;'>
                <tr>
                    <td style='width: 30%;'>
                        <img src='Imagens/" . $row['imagem'] . "' style='width: 100%'>  
                    </td>
                    <td>
                        Aluno: " . $row['aluno'] . "<br>Livro: " . $row['livro'] . "<br>Data emprestado: " . date('d-m-Y', strtotime($row['dataEmprestimo'])) . "<br>Data de entrega: " . date('d-m-Y', strtotime($row['dataDevolucao']))."
                    </td>
                    </tr>
                </table>";
        echo "<form method='post' action='livroDevolucaoBD.php'>
                    <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                    <input type='submit' value='Devolvido'>
                    </form>";
        #Busca de informações de empréstimo através de título de livro.
    }
    $conexao->close();
    exit();
}
?>