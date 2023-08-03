<?php 
include('protect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Turmas | Mascarenhas</title>
</head>
<body>
    <center>
    <h1 style="margin-top: 10em;">Cadastro de Turmas</h1>
    <form action="processa.php" method="post">
        <label for="nome">Nome da Turma:</label>
        <input type="text" name="nome" required>
        <label for="turno">Turno:</label>
        <input type="text" name="turno" required>
        <button type="submit" name="cadastrar">Cadastrar</button><a href="index.php">Voltar</a>
    </form>

    <h2>Turmas Cadastradas:</h2>
    <?php include 'listar.php'; ?>
</body>
</html>
