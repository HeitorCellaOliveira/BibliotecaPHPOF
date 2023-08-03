<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .div1, .div2 {
            width: 45%;
            margin-top: 20em;
        }
    </style>
    <title>Lista Livro | Mascarenhas</title>
</head>
<body>
    <center>
    <div class="container">
        <div class="div1">
            <form action="livroBuscar.php" method="POST" id="formlogin" name="formlogin">
                <table>
                    <tr><td><h1>Atualizar dados</h1></td></tr>
                    <tr><td><label>Nome do Livro</label></td></tr>
                    <tr><td><input type="text" name="buscaBook" id="buscaBook" placeholder="Procure por um livro."></td></tr>
                    <tr><td><br><input type="submit" value="Buscar"><a href="index.php">Voltar</a></td></tr>
                </table>
            </form>
        </div>
        <div class="div2">
            <form action="livrosBuscar.php" method="post" id="formlogin" name="formlogin">
                <table>
                    <tr><td><h1>Deletar Dados</h1></td></tr>
                    <tr><td><label>Nome do Livro:</label></td></tr>
                    <tr><td><input type="text" name="buscarLivros" id="buscarLivros" placeholder="Procure por um livro."></td></tr>
                    <tr><td><br><input type="submit" value="Buscar"><a href="index.php">Voltar</a></td></tr>
                </table>
            </form>
        </div>
    </div>
    </center>
</body>
</html>
