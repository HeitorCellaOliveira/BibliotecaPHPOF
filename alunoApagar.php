<html>
    <body>
        <?php
            include('protect.php');

            $hostname = "127.0.0.1";
            $user = "root";
            $password = "root";
            $database = "biblioteca";

            $conexao = new mysqli($hostname, $user, $password, $database);

            if ($conexao -> connect_errno) {
                echo 'Falha ao conectar com o Banco de Dados: ' . $conexao -> connect_errno;
                exit();
            } else {
                $deletar = $conexao -> real_escape_string($_POST['deletar']);

                $sql = "DELETE FROM `biblioteca` . `cadastroalunos` WHERE `id` = '".$deletar ."';";

                $resultado = $conexao -> query($sql);

                $conexao -> close();
                header('Location: buscarAluno.php?mensagem=deletado', true, 301);
            }

        ?>
    </body>
</html>