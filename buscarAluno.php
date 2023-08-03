<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .div1, .div2 {
            width: 100em;
            margin-top: 20em;
        }
    </style>
    <title>Lista Livro | Mascarenhas</title>

    
    <?php
    include('protect.php');
    ?>
</head>
<body>
    <center>
    <div class="container">
        <div class="div1">
            <form action="alunoBuscar.php" method="POST" id="formlogin" name="formlogin">
                <table>
                    <tr><td><h1>Atualizar dados</h1></td></tr>
                    <tr><td><label>Nome do Aluno</label></td></tr>
                    <tr><td><input type="text" name="buscarUser" id="buscarUser" placeholder="Procure por um aluno."></td></tr>
                    <tr><td><br><input type="submit" value="Buscar"><a href="index.php">Voltar</a></td></tr>
                </table>
            </form>
            <?php
            $mensagem = $_GET['mensagem'] ?? '';
            if ($mensagem == 'atualizado') {
                echo '<span class="">Dados atualizados com sucesso!</span>';
            }
            ?>
        </div>
        <div class="div2">
            <form action="alunosBuscar.php" method="POST" id="formlogin" name="formlogin">
                <table>
                    <tr><td><h1>Deletar Dados</td></tr>
                    <tr><td><label class="">Nome do Aluno:</label></td></tr>
                    <tr><td><input type="text" name="buscarAlunos" id="buscarAlunos" placeholder="Procure por um aluno."></td></tr>
                    <tr><td><br><input type="submit" value="Buscar"><a href="index.php">Voltar</a></tr>
                </table>
            </form>
            <?php $mensagem = $_GET['mensagem'] ?? '';
            if ($mensagem == 'deletado') {
                echo '<span class="">Dados deletados com sucesos!</span>';
            }?>
        </div>
    </div>
    </center>
</body>
</html>
