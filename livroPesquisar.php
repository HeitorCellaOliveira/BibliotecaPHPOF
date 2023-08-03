<?php
session_start();
$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
} else {
    $nome = $_GET['nomePesquisado'];
    $pesquisa = "SELECT * FROM `acervo`
    WHERE `nome`
    LIKE '%" . $nome . "%'
    OR `autor`
    LIKE '$". $nome . "%'
    OR `genero`
    LIKE '%". $nome ."%';";
    $resultado = $conexao->query($pesquisa);

    if ($resultado->num_rows !=0) {
        $row = $resultado->fetch_array();
        echo "<br><br><table style='width: 20%;'>
        <tr>
            <td style='width: 40%;'>
                <img src='Imagens/" . $row['capaLivro'] . "' style='width: 100%'>  
            </td>
            <td>
            Nome: " . $row['nome'] . "<br>Autor: " . $row['autor'] . "<br>Editora: " . $row['editora'] . "<br>Ano de Publicado: " . $row['anoPublicado'] . "<br>ISBN: " . $row['isbn'] . "<br>CDD: " . $row['cdd'] . "<br>CDU: " . $row['cdu'] . "<br>Gênero: " . $row['genero'] .'
            </td>
        </tr>
    </table>';
    }
    $conexao->close();
    exit();
}
?>