<!--Pesquisa de usuário-->
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
  #Busca de informações de usuários através de seu nome.
  $nome = $_GET['turmaPesquisada'];
  $pesquisa = "SELECT * FROM `cadastroturmas` 
  WHERE `nome` 
  LIKE '%" . $nome . "%'";
  $resultado = $conexao->query($pesquisa);
  #Busca de informações de usuários através de seu nome.
  #Informações de usuário que são exibidas.
  if ($resultado->num_rows != 0) {
    $row = $resultado->fetch_array();
    echo "<br><br>" . $row['nome'] . "<br>Turno: " . $row['turno'] . "<br>Quantidade de Alunos: " . $row['num_alunos'];
    echo "<form method='post' action='turmasAtualizar.php'>
                    <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                    <input type='submit' value='Editar'>
                    </form>";
  }
  #Informações de usuário que são exibidas.
  $conexao->close();
  exit();
}
?>