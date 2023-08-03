<html>
    <body>
        <?php
            include('protect.php');

            $hostname = "127.0.0.1";
            $user = "root";
            $password = "root";
            $database = "biblioteca";

            $conexao = new mysqli($hostname,$user,$password,$database);

            if ($conexao -> connect_errno) {
				echo "Falha ao conectar com o Banco de Dados: " . $conexao -> connect_error;
				exit();
			} else {

                $id = $conexao -> real_escape_string($_POST['id']);
				$nome = $conexao -> real_escape_string($_POST['nome']);
				$telefone = $conexao -> real_escape_string($_POST['telefone']);
                $turma = $conexao -> real_escape_string($_POST['turma']);

                $sql = "UPDATE `biblioteca` . `cadastroalunos`
                        SET `nome`='".$nome."',
                            `telefone`='".$telefone."',
                            `turma`='".$turma."'
                        WHERE   
                            `id`='".$id."';";


                $resultado = $conexao -> query($sql);

                $conexao -> close();
                header('Location: buscarAluno.php?mensagem=att', true, 301);
                //var_dump($sql);

            }

        ?>
    </body>
</html>