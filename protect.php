<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a style = 'text-decoration: none;' href=\"loginPage.php\">Voltar</a></p>");
}


?>