<!--Página de de editar as informações de alunos-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Atualizar | Mascarenhas</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>Atualizar Dados</h1>
    <?php
    #Conexão com o banco de dados.
    session_start();
    $hostname = '127.0.0.1';
    $user = 'root';
    $password = '';
    $database = 'biblioteca';
    $conexao = new mysqli($hostname, $user, $password, $database);
    if ($conexao->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
        exit();
        #Conexão com o banco de dados.
    } else {
        #Busca de informações de usuários através de seu ID.
        $id = $conexao->real_escape_string($_POST['id']);
        $infosDeAluno = 'SELECT * FROM `cadastroalunos` WHERE `id` = ' . $id . ';';
        $resultado = $conexao->query($infosDeAluno);
        #Busca de informações de usuários através de seu ID.
        #Form com as informações do usuários, disponíveis para alteração ou não.
        if ($resultado->num_rows != 0) {
            $row = $resultado->fetch_array();
            echo '<form method="post" action="estudantesAtualizarBD.php" id="cadastro" name="cadastro">
                            <label class="">Nome completo:</label>
                            <br><input type="text" id="nome" name="nome" value="' . $row['nome'] . '" required>
                            <br><br><label class="">Endereço:</label>
                            <br><input type="text" id="endereco" name="endereco" value="' . $row['endereco'] . '" required>
                            <br><br><label class="">Turma:</label>
                            <br><input type="text" id="turma" name="turma" value="' . $row['turma'] . '" required>
                            <br><br><label class="">Telefone:</label>
                            <br><input type="text" id="telefone" name="telefone" value="' . $row['telefone'] . '" required>
                            <br><br><label class="">Nº da Matrícula:</label>
                            <br><input type="text" id="nMatricula" name="nMatricula" value="' . $row['nMatricula'] . '" required>
                            <input type="hidden" value="' . $row['id'] . '" id="id" name="id">
                            <br><br><input type="submit" value="Salvar">
                        </form>
                        <br>';
            #Submit para o processo de apagar usuário.
            echo '<form method="post" action="estudantesApagar.php" id="apagar" name="apagar">
                        <input type="hidden" value="' . $row['id'] . '" id="id" name="id">
                        <input type="submit" value="Apagar">
                    </form>';
            #Submit para o processo de apagar usuário.
            #Retornar a página anterior.
            echo '<br><a href="estudantes.php">Voltar</a>';
            #Retornar a página anterior.
            $conexao->close();
            exit();
            #Form com as informações do usuários, disponíveis para alteração ou não.
        }
    }
    ?>
</body>

</html>