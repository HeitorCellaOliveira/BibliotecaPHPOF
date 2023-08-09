<!--Página de visualização de estudantess-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Estudantes | Mascarenhas</title>
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
    <h1>Estudantes</h1>
    <?php
    #Conexão com o banco de dados.
    session_start();
    $hostname = '127.0.0.1';
    $user = 'root';
    $password = 'root';
    $database = 'biblioteca';
    $conexao = new mysqli($hostname, $user, $password, $database);
    if ($conexao->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
        exit();
        #Conexão com o banco de dados.
    } else {
        #Lista com todos os usuários.
        $mostrarestudantess = 'SELECT * FROM `cadastroalunos`';
        $resultado = $conexao->query($mostrarestudantess);
        #Campo para busca de usuário.
        echo "<input type='text' id='pesquisa' onkeyup='showHint(this.value)' placeholder='Pesquise por nome'>
        <span id='txtHint'></span>
        <script>
        function showHint(str) {
            if (str.length == 0) { 
              document.getElementById('txtHin').innerHTML = '';
              return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('txtHint').innerHTML = this.responseText;
                }
            };
            xhttp.open('GET', 'estudantesPesquisar.php?nomePesquisado='+str, true);
            xhttp.send();
          }
        </script>";
        #Campo para busca de usuário.
        #Hyperlink para cadastro de estudantes.
        echo "<br><br><a href='estudantesCadastrar.php' class='texto1'>Cadastrar estudantes</a><br>";
        #Hyperlink para cadastro de estudantes.
        while ($row = mysqli_fetch_array($resultado)) {
            echo "<br>" . $row['nome'] . "<br>Endereço: " . $row['endereco'] ."<br>Telefone: (+55) " . $row['telefone'];
            #Form para a função de editar informações de estudantess.
            echo "<form method='post' action='estudantesAtualizar.php'>
                    <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                    <input type='submit' value='Editar'>
                    </form>";
            #Form para a função de editar informações de estudantess.
        }
        #Lista com todos os usuários.
    }
    ?>
    <!--Retornar a página anterior-->
    <br><a href='index.php'>Voltar</a>
    <!--Retornar a página anterior-->
</body>

</html>