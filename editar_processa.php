<?php
include('protect.php');

// Verifica se o formulário foi enviado
if (isset($_POST['editar'])) {
    // Obtém o índice da turma a ser editada
    $indice = $_GET['indice'];

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $turno = $_POST['turno'];

    // Faz a validação dos dados (pode ser adicionada mais validação se necessário)

    // Lê o arquivo de turmas
    $turmas = file('turmas.txt');

    // Atualiza o nome da turma no array
    if (isset($turmas[$indice])) {
        $turmas[$indice] = date('Y-m-d H:i:s') . ' | ' . $nome . ' | ' . $turno ."\n";
    }

    // Grava o array de volta no arquivo
    file_put_contents('turmas.txt', implode('', $turmas));

    // Redireciona para a página inicial
    header('Location: cadastroTurmas.php');
    exit();
}
?>
