<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <?php
        session_start();

        $hostname = "127.0.0.1";
        $user = "root";
        $password = "root";
        $database = "biblioteca";

        $conexao = new mysqli($hostname, $user, $password, $database);

        if ($conexao->connect_errno) {
            echo "Failed to connect to MySQL: " . $conexao->connect_error;
            exit();
        } else {
            $nome = $conexao->real_escape_string($_POST['nome']);
            $genero = $conexao->real_escape_string($_POST['genero']);
            $autor = $conexao->real_escape_string($_POST['autor']);
            $anoPublicado = $conexao->real_escape_string($_POST['anoPublicado']);
            $sinopse = $conexao->real_escape_string($_POST['sinopse']);
            $capaLivro = $conexao->real_escape_string($_POST['capaLivro']);
            $qtdLivros = $conexao->real_escape_string($_POST['qtdLivros']);
            $dataEntrada = $conexao->real_escape_string($_POST['dataEntrada']);

            

            $sql = "INSERT INTO `biblioteca` . `acervo` 
                    (`nome`, `genero`, `autor`, `anoPublicado`, `sinopse`, `qtdLivros`, `dataEntrada`, `capaLivro`)
                VALUES
                    ('$nome', '$genero', '$autor', '$anoPublicado', '$sinopse', '$qtdLivros', '$dataEntrada', '$capaLivro')";

            $resultado = $conexao->query($sql);

            if ($resultado) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . $conexao->error;
            }

            $conexao->close();
        }

        if (isset($_FILES['capaLivro'])) {
            $ext = strtolower(substr($_FILES['capaLivro']['name'], -4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './Downloads/'; //Diretório para uploads 
            move_uploaded_file($_FILES['capaLivro']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
            echo("Imagem enviada com sucesso!");
        }

        header('Location: cadastroLivros.php', true, 301);
        //var_dump($sql);
    ?>
    </body>
</html>
