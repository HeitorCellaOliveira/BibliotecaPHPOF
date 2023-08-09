<!--Página de visualização de livros-->
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="pt-BR">
<html>

<head>
    <title>Catálogo | Mascarenhas</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>Livros</h1>
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
        #Lista com todos os livros.
        $mostrarLivros = 'SELECT * FROM `acervo`';
        $resultado = $conexao->query($mostrarLivros);
        #Campo para busca de livro.
        echo "<input type='text' id='pesquisa' onkeyup='showHint(this.value)' placeholder='Pesquise por título'>
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
            xhttp.open('GET', 'livroPesquisar.php?nomePesquisado='+str, true);
            xhttp.send();
          }
        </script><br>";
        #Campo para busca de livro.
        while ($row = mysqli_fetch_array($resultado)) {
            echo "<br><table style='width: 20%;'>
                <tr>
                    <td style='width: 40%;'>
                        <img src='Imagens/" . $row['capaLivro'] . "' style='width: 100%'>  
                    </td>
                    <td>
                        Título: " . $row['nome'] . "<br>Autor: " . $row['autor'] . "<br>Editora: " . $row['editora'] . "<br>Ano de Publicação: " . $row['anoPublicado'] . "<br>ISBN: " . $row['isbn'] . "<br>CDD: " . $row['cdd'] . "<br>CDU: " . $row['cdu'] . "<br>Gênero: " . $row['genero'] .'
                    </td>
                </tr>
            </table>';
            #Form para a função de emprestar livros.
            echo "<form method='post' action='livroEmprestar.php'>
                    <input type='hidden' value='" . $row['nome'] . "' id='nome' name='nome'>
                    <input type='submit' value='Emprestar'>
                    </form>";
            #Form para a função de emprestar livros.
        }
        #Lista com todos os livros.
    }
    ?>
    <!--Retornar a página anterior-->
    <br><a href='index.php'>Voltar</a>
    <!--Retornar a página anterior-->
</body>

</html>