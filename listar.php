<?php
include('protect.php');
// Lê o arquivo de turmas
$turmas = file('turmas.txt');

// Exibe as turmas em uma tabela
echo '<table border="1">';
echo '<tr><th>ID</th><th>Nome da Turma</th><th>Turno</th><th>Ações</th></tr>';

foreach ($turmas as $indice => $turma) {
    // Extrai o nome da turma e a data/hora do cadastro
    list($dataHora, $nome, $turno) = explode(' | ', $turma);

    // Exibe os dados da turma na tabela
    echo '<tr>';
    echo '<td>' . $indice . '</td>';
    echo '<td>' . $nome . '</td>';
    echo '<td>' . $turno . '</td>';
    echo '<td><a href="editar.php?indice=' . $indice . '">Editar</a> | <a href="processa.php?excluir=' . $indice . '">Excluir</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
