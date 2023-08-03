<?php 
include('protect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Turma | Mascarenhas</title>
</head>
<body>
    <center>
    <h1 style="margin-top: 10em;">Editar Turma</h1>
</center>
    <?php
    // Obtém o índice da turma a ser editada
    $indice = $_GET['indice'];

    // Lê o arquivo de turmas
    $turmas = file('turmas.txt');

    // Obtém os dados da turma
    if (isset($turmas[$indice])) {
        list($dataHora, $nome, $turno) = explode(' | ', $turmas[$indice]);

        // Exibe o formulário de edição
        echo '<center>';
        echo '<form action="editar_processa.php?indice=' . $indice . '" method="post">';
        echo '<label for="nome">Nome da Turma:</label>';
        echo '<input type="text" name="nome" value="' . $nome . '" required>';
        echo '<label for="turno">Turno:</label>';
        echo '<input type="text" name="turno" value"' . $turno . '" required>';
        echo '<button type="submit" name="editar">Salvar</button>';
        echo '</form>';
        echo '</center>';
    } else {
        echo '<p>Turma não encontrada.</p>';
    }
    ?>
</body>
</html>
