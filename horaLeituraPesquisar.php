<!--Pesquisa de usuário-->
<?php
include('protect.php');

#Conexão com o banco de dados.
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
  #Busca de informações de usuários através de seu nome.
  $nome = $_GET['nomePesquisado'];
  $pesquisa = "SELECT * FROM `horaleitura` 
  WHERE `nome` 
  LIKE '%" . $nome . "%'
  OR `telefone`
  LIKE '%" . $nome . "%';";
  $resultado = $conexao->query($pesquisa);
  #Busca de informações de usuários através de seu nome.
  #Informações de usuário que são exibidas.
  if ($resultado->num_rows != 0) {
    $row = $resultado->fetch_array();
    echo "<br><br>" . $row['nome'] . "<br>Turma: " . $row['turma'] . "<br>Telefone: (+55) " . $row['telefone']. "<br>Livro Atual: ". $row['nomeLivro'] . "<br>Página Atual: ". $row['atualPag'];
    echo "<form method='post' action='clubeAtualizar.php'>
                    <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                    <br><input type='submit' value='Editar'>
                    </form>";
  }
  #Informações de usuário que são exibidas.
  $conexao->close();
  exit();
}
?>