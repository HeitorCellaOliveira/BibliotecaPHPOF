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
            $qtdLivros = $conexao->real_escape_string($_POST['qtdLivros']);
            $editora = $conexao->real_escape_string($_POST['editora']);
            $nPags = $conexao->real_escape_string($_POST['nPags']);
            $isbn = $coneoxa->real_escape_string($_POST['isbn']);
            $cdd = $conexao->real_escape_string($_POST['cdd']);
            $cdu = $conexao->real_escape_string($_POST['cdu']);
            
            if (isset($_FILES['capaLivro'])) {
                $extensao = strtolower(substr($_FILES['capaLivro']['name'], -4));
                $arquivo = date("Y.m.d-H.i.s") . $extensao;
                $dir = './Imagens/';
                move_uploaded_file($_FILES['capaLivro']['tmp_name'], $dir . $arquivo);
            }

            $sql = "INSERT INTO `biblioteca` . `acervo` 
                    (`nome`, `genero`, `autor`, `anoPublicado`, `sinopse`, `qtdLivros`, `editora`, `nPags`, `isbn`, `cdd`, `cdu`)
                VALUES
                    ('$nome', '$genero', '$autor', '$anoPublicado', '$sinopse', '$qtdLivros', '$editora', '$nPags', '$isbn', '$cdd', '$cdu')";

            $resultado = $conexao->query($sql);

            if ($resultado) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . $conexao->error;
            }

            $conexao->close();
        }

        header('Location: cadastroLivros.php', true, 301);
        //var_dump($sql);
    ?>
    </body>
</html>
