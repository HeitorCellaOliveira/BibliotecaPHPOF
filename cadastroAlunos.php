<?php
include('conexao.php');

if(isset($_POST['nome']) || isset($_POST['turma']) || isset($_POST['telefone'])) {
    if(strlen($_POST['nome']) == 0) {
        echo "<script> alert('Insira o nome do Aluno!')</script>";
    } else if (strlen($_POST['turma']) == 0) {
        echo "<script> alert('Insira a turma do Aluno!')</script>";
    } else if (strlen($_POST['telefone']) == 0) {
        echo "<script> alert('Insira o telefone do Aluno!')</script>";
    } else if (strlen($_POST['nome' && 'turma' && 'telefone']) == 0) {
        echo "<script> alert('Preencha os campos!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="">
    <title>Cadastro Alunos | Mascarenhas</title>

    <script>
    function formatarTelefone() {
    var telefone = document.getElementById('telefone');
    var valor = telefone.value;

    // Remove todos os caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Verifica se o número possui 11 dígitos (com DDD)
    if (valor.length === 11) {
        valor = valor.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, '($1) $2 $3-$4');
    }
    // Verifica se o número possui 10 dígitos (sem DDD)
    else if (valor.length === 10) {
        valor = valor.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
    }

    telefone.value = valor;
    }
    </script>
</head>
<body>
    <center>
    <form action="cadastroAlunosBD.php" method="post" id="formlogin" name="formlogin">
        <table style="margin-top: 20em;">
            <tr><td><h1>Cadastro de Alunos</h1></td></tr>

            <tr><td><label class="">Nome do Aluno:</label></td></tr>

            <tr><td><input  class="" type="text" name="nome" id="nome" placeholder="Digite o nome do Aluno."></td></tr>

            <tr><td><br><label class="">Turma:</td></tr>

            <tr><td><input class="" type="text" name="turma" id="turma" placeholder="Digite a turma do Aluno."></td></tr>

            <tr><td><br><label class="">Telefone:</label></td></tr>

            <tr><td><input class="" type="text" name="telefone" id="telefone" onkeyup="formatarTelefone()" placeholder="Digite o telefone do Aluno."></td></tr>

            <tr><td><br><input class="" type="submit" value="Cadastrar"><a href="index.php">Voltar</a></td></tr></td></tr>
            
        </table>
    </form>
    </center>
</body>
</html>