<?php
include('protect.php');

// Verifica se o formulário foi enviado
if (isset($_POST['cadastrar'])) {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $turno = $_POST['turno'];

    // Faz a validação dos dados (pode ser adicionada mais validação se necessário)

    // Salva a turma em um arquivo ou banco de dados (aqui vamos salvar em um arquivo de texto)
    $data = date('Y-m-d H:i:s'); // Data e hora atual
    $turma = "$data | $nome | $turno\n"; // Monta a linha a ser gravada no arquivo

    file_put_contents('turmas.txt', $turma, FILE_APPEND);

    // Redireciona para a página inicial
    header('Location: cadastroTurmas.php');
    exit();
}

if (isset($_GET['excluir'])) {
    // Obtém o índice da turma a ser excluída
    $indice = $_GET['excluir'];

    // Lê o arquivo de turmas
    $turmas = file('turmas.txt');

    // Remove a turma do array
    if (isset($turmas[$indice])) {
        unset($turmas[$indice]);
    }

    // Grava o array de volta no arquivo
    file_put_contents('turmas.txt', implode('', $turmas));

    // Redireciona para a página inicial
    header('Location: cadastroTurmas.php');
    exit();
}
?>
