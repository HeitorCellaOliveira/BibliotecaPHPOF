<?php include('protect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Catálogo | Mascarenhas</title>
</head>
<body>
    <h1>Livros</h1>
    <?php
    session_start();
    $hostname = '127.0.0.1';
    $user = 'root';
    $password = 'root';
    $database = 'biblioteca';

    $conexao = new mysqli($hostname, $user, $password, $database);

    if ($conexao->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
        exit();
    } else {
        $printLivros = 'SELECT * FROM `acervo`';
        $resultado = $conexao->query($printLivros);

        echo "<input type='text' id='pesquisa' onkeyup='showHint(this.value)' placeholder='Pesquise um livro específico'>
        <span id='txtHint'></span>
        <script>
        function showHint(str) {
            if (srt.length == 0) {
                document.getElementById('txtHint').innerHTML = '';
                return;
            }
            const xhttp = new XMLHRequest();
            xhttp.orneadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('txtHint').innerHTML = this.responseText;
                }
            };
            xhttp.open('GET', 'livroPesquisar.php?nomePesquisado='+str, true);
            xhttp.send();
        }
        </script>";
    }
</body>
</html>