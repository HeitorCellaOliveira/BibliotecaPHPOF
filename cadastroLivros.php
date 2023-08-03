
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="">
    <title>Lista Livros | Mascarenhas</title>
</head>
<body>
    <center>
    <form action="cadastroLivrosBD.php" method="POST" id="formlogin" name="formlogin">
        <table>
            <tr><td><h1 class="">Cadastro de Livros</h1></td></tr>

            <tr><td><label class="">Nome:</label></td></tr>

            <tr><td><input type="text" name="nome" id="nome" class="" placeholder="Digite o nome do livro" required></td></tr>
    
            <tr><td><br><label class="">Gênero:</label></td></tr>
            
            <tr><td><input class ="" type="text" name="genero" id="genero" placeholder="Digite o gênero do livro" required></td></tr>
    
            <tr><td><br><label class="">Autor:</label></td></tr>
            
            <tr><td><input class ="" type="text" name="autor" id="autor"  placeholder="Digite o Autor do livro" required></td></tr>
    
            <tr><td><br><label class="">Editora</label></tr></td>

            <tr><td><input type="text" class="" name="editora" id="editora" placeholder="Digite a editora do livro."></td></tr>
            
            <tr><td><br><label class="">Ano de Publicação:</label></td></tr>
            
            <tr><td><input class ="" type="text" name="anoPublicado" id="anoPublicado" placeholder="Digite o ano publicado" required></td></tr>

            <tr><td><br><label class="">Sinopse:</label></td></tr>
            
            <tr><td><textarea name="sinopse" placeholder="Digite a sinopse do livro" style="font-family:Arial, Helvetica, sans-serif;" required></textarea></td></tr>

            <tr><td><br><label class="">Quantidade de Livros:</label></td></tr>
            
            <tr><td><input type="text" name="qtdLivros" id="qtdLivros" class="" placeholder="Digite a quantidade de livros" required></td></tr>

            <tr><td><br><label class="">Nº de Páginas:</label></td></tr>

            <tr><td><input type="text" class="" name="nPags" id="nPags" placeholder="Digite o número de págs" required></td></tr>

            <tr><td><br><label class="">ISBN</label></td></tr>

            <tr><td><input type="text" class="" name="isbn" id="isbn" placeholder="Digite o isbn do livro." required></td></tr>
            
            <tr><td><br><label class="">CDD</label></td></tr>

            <tr><td><input type="text" class="" name="cdd" id="cdd" placeholder="Digite o CDD do livro." required></td></tr>
            
            <tr><td><br><label class="">CDU</label></td></tr>

            <tr><td><input type="text" class="" name="cdu" id="cdu" placeholder="Digite o cdu do livro." required></td></tr>
            
            <tr><td><br><label class="">Data de Entrada:</label></td></tr>

            <tr><td><input type="date" name="dataEntrada" id="dataEntrada" class="" required></td></tr>

            <tr>
                <form method="POST" enctype="multipart/form-data">
                    <td><br><label for="conteudo" class="">Capa do Livro: </label></td>
            </tr>

            <tr><td><input type="file" name="capaLivro" id="capaLivro" accept="image/*" class=""></td></tr>

            <tr><td><br><input type = "submit" value = "Cadastrar" class = "botao"><a class="voltar" href="index.php">Voltar</a></form></td></tr>

        </table>
    </form>
    </center>
</body>
</html>