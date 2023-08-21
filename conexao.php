<?php
include('protect.php');

$usuario = 'root';
$senha = '';
$database = 'biblioteca';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao MySQL: " . $mysqli->error);
}

?>