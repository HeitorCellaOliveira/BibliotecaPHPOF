<?php include('protect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multas | Mascarenhas</title>
</head>
<body>
<h1>Multas</h1>

<?php
$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';

$conexao = new mysqli($hostname, $user, $password, $database);
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
} else {
    $sql_multas = "SELECT emprestimoID, dataDevolucao, multaPaga FROM devolucoes";
    $result_multas = $conexao->query($sql_multas);

    if ($result_multas === false) {
        echo "Erro na consulta SQL das multas: " . $conexao->error;
    } else {
        while ($row_multa = $result_multas->fetch_assoc()) {
            echo "Empréstimo ID: " . $row_multa['emprestimoID'] . "<br>";
            echo "Data de Devolução: " . $row_multa['dataDevolucao'] . "<br>";
            echo "Multa (R$): " . number_format($row_multa['multaPaga'], 2, ',', '.') . "<br>";
            
            if ($row_multa['multaPaga'] > 0) {
                echo "<button onclick='apagarMulta(" . $row_multa['emprestimoID'] . ")'>Apagar Multa</button>";
                echo "<br><br><a href='index.php'>Voltar</a>";
            } else {
                echo "Multa paga.";
            }
            
            echo "<hr>"; // Adiciona uma linha horizontal para separar as multas
        }
    }
}
?>

<script>
function apagarMulta(emprestimoID) {
    if (confirm("Tem certeza de que deseja apagar esta multa?")) {
        window.location.href = "multasApagar.php?emprestimoID=" + emprestimoID;
    }
}
</script>
</body>
</html>