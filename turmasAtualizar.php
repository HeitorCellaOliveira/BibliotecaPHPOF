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
    include('protect.php');
    #Conexão com o banco de dados.
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
        $infosDeTurmas = 'SELECT * FROM `cadastroturmas` WHERE `id` = ' . $id . ';';
        $resultado = $conexao->query($infosDeTurmas);
        #Busca de informações de usuários através de seu ID.
        #Form com as informações do usuários, disponíveis para alteração ou não.
        if ($resultado->num_rows != 0) {
            $row = $resultado->fetch_array();
            echo '<form method="post" action="turmasAtualizarBD.php" id="cadastro" name="cadastro">
                            <label class="">Nº da Turma:</label>
                            <br><input type="text" id="nome" name="nome" value="' . $row['nome'] . '" required>
                            <br><br><label class="">Turma:</label>
                            <br><input type="text" id="turma" name="turma" value="' . $row['turma'] . '" required>
                            <br><br><label class="">turno:</label>
                            <br><input type="text" id="turno" name="turno" value="' . $row['turno'] . '" required>
                            <br><br><label class="">Quantidade de Alunos: </label>
                            <br><input type="number" id="num_alunos" name="num_alunos" value="'. $row['num_alunos'] .'" required>
                            <input type="hidden" value="' . $row['id'] . '" id="id" name="id">
                            <br><br><input type="submit" value="Salvar">
                        </form>
                        <br>';
            #Submit para o processo de apagar usuário.
            echo '<form method="post" action="turmasApagar.php" id="apagar" name="apagar">
                        <input type="hidden" value="' . $row['id'] . '" id="id" name="id">
                        <input type="submit" value="Apagar">
                    </form>';
            #Submit para o processo de apagar usuário.
            #Retornar a página anterior.
            echo '<br><a href="turmas.php">Voltar</a>';
            #Retornar a página anterior.
            $conexao->close();
            exit();
            #Form com as informações do usuários, disponíveis para alteração ou não.
        }
    }
    ?>
</body>

</html>