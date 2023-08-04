<!--Página de cadastro de aluno-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Cadastro Alunos | Mascarenhas</title>
    <link rel="stylesheet" href="">

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
    <!--Forms para cadastro-->
    <h1>Cadastro de aluno</h1>
    <form method="post" action="estudantesCadastrarBD.php" id="cadastro" name="cadastro">
        <label class="">Nome completo:</label>
        <br><input type="text" id="nome" name="nome" required>
        <br><br><label class="">Endereço:</label>
        <br><input type="text" id="endereco" name="endereco" required>
        <br><br><label class="">Telefone:</label>
        <br><input onkeyup="formatarTelefone()" type="text" id="telefone" name="telefone" required>
        <br><br><label class="">Turma:</label>
        <br><input type="text" id="turma" name="turma" required>
        <br><br><input type="submit" value="Cadastrar">
    </form>
    <!--Forms para cadastro-->
    <!--Retornar a página anterior-->
    <br><a href='estudantes.php'>Voltar</a>
    <!--Retornar a página anterior-->
</body>

</html>