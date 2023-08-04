<!--Página de visualização de empréstimos-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Empréstimos | Mascarenhas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Empréstimos</h1>
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
        #Lista com todos os empréstimos.
        $mostrarEmprestimos = 'SELECT * FROM `emprestimos`';
        $resultado = $conexao->query($mostrarEmprestimos);
        #Campo para busca de empréstimos.
        echo "<input type='text' id='pesquisa' onkeyup='showHint(this.value)' placeholder='Pesquise por título ou aluno'>
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
            xhttp.open('GET', 'emprestimoPesquisar.php?emprestimoPesquisado='+str, true);
            xhttp.send();
          }
        </script><br>";
        #Campo para busca de empréstimo.
        while ($row = mysqli_fetch_array($resultado)) {
            echo "<br><table style='width: 20%;'>
                <tr>
                    <td style='width: 30%;'>
                        <img src='Imagens/" . $row['capaLivro'] . "' style='width: 100%'>  
                    </td>
                    <td>
                        Aluno: " . $row['aluno'] . "<br>Livro: " . $row['livro'] . "<br>Data emprestado: " . date('d-m-Y', strtotime($row['dataEmprestimo'])) . "<br>Data de entrega: " . date('d-m-Y', strtotime($row['dataDevolucao']))."
                    </td>
                    </tr>
                </table>";
            #Form para a função de editar informações de livros.
            echo "<form method='post' action='livroDevolucaoBD.php'>
                    <input type='hidden' value='" . $row['id'] . "' id='id' name='id'>
                    <input type='submit' value='Devolvido'>
                    </form>";
            #Form para a função de editar informações de livros.
        }
        #Lista com todos os empréstimos.
    }
    ?>
    <!--Retornar a página anterior-->
    <br><a href='index.php'>Voltar</a>
    <!--Retornar a página anterior-->
</body>

</html>