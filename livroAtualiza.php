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
				$genero = $conexao -> real_escape_string($_POST['genero']);
				$autor = $conexao -> real_escape_string($_POST['autor']);
				$anoPublicado = $conexao -> real_escape_string($_POST['anoPublicado']);
				$sinopse = $conexao->real_escape_string($_POST['sinopse']);
				$qtdLivros = $conexao -> real_escape_string($_POST['qtdLivros']);
                $dataEntrada = $conexao -> real_escape_string($_POST['dataEntrada']);

                $sql = "UPDATE `biblioteca` . `acervo`
                        SET `nome`='".$nome."',
                            `genero`='".$genero."',
                            `autor`='".$autor."',
                            `anoPublicado`='".$anoPublicado."',
                            `sinopse`='".$sinopse."',
                            `dataEntrada`='".$dataEntrada."',
                            `qtdLivros`='".$qtdLivros."'
                        WHERE   
                            `id`='".$id."';";


                $resultado = $conexao -> query($sql);

                $conexao -> close();
                header('Location: buscarLivro.php?mensagem=atualizado', true, 301);
                //var_dump($sql);

            }

        ?>
    </body>
</html>