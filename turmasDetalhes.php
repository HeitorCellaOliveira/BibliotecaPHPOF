<?php
$hostname = '127.0.0.1';
$user = 'root';
$password = 'root';
$database = 'biblioteca';
$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
}

if (isset($_GET['id'])) {
    $idTurma = $_GET['id'];

    // Consulta para obter os estudantes da turma pelo ID
    $consultaEstudantes = "SELECT * FROM cadastroalunos WHERE turma = $idTurma";
    $resultadoEstudantes = $conexao->query($consultaEstudantes);
    
    echo '<h2>Estudantes da Turma</h2>';
    while ($row = mysqli_fetch_array($resultadoEstudantes)) {
        echo '<tr>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '</tr>';
        echo '<br>';
        echo '</tr>';
        echo '<td>' . $row['telefone'] . '</td>';
        echo '</tr>';
        echo '<br>';
        echo '<tr>';
        echo '<td>' . $row['nMatricula'] . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo 'Turma não especificada.';
}

$conexao->close();
?>
