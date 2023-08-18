<?php
session_start();

$hostname = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'biblioteca';

date_default_timezone_set('America/Sao_Paulo');

// Create a database connection
$conexao = new mysqli($hostname, $user, $password, $database);

// Check the database connection
if ($conexao->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $conexao->connect_error;
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $autor = $conexao->real_escape_string($_POST['autor']);
    $editora = $conexao->real_escape_string($_POST['editora']);
    $anoPublicado = intval($_POST['anoPublicado']); // Ensure integer value
    $nPags = intval($_POST['nPags']); // Ensure integer value
    $isbn = $conexao->real_escape_string($_POST['isbn']);
    $rua = $conexao->real_escape_string($_POST['rua']);
    $estante = $conexao->real_escape_string($_POST['estante']);
    $prateleira = $conexao->real_escape_string($_POST['prateleira']);
    $genero = $conexao->real_escape_string($_POST['genero']);
    $qtdLivros = intval($_POST['qtdLivros']); // Ensure integer value

    // Handle file upload
    if (isset($_FILES['capaLivro']) && $_FILES['capaLivro']['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($_FILES['capaLivro']['name'], PATHINFO_EXTENSION));
        $arquivo = date("Y.m.d-H.i.s") . '.' . $extensao;
        $diretorio = './Imagens/';
        move_uploaded_file($_FILES['capaLivro']['tmp_name'], $diretorio . $arquivo);
    } else {
        // Handle no file uploaded or error
        $arquivo = ''; // Set a default value or handle the error
    }

    // Insert data into the database
    $cadastrarLivro = 'INSERT INTO `acervo`(`nome`, `autor`, `editora`, `anoPublicado`, `nPags`, `isbn`, `rua`, `estante`, `prateleira`, `genero`, `qtdLivros`, `capaLivro`)
            VALUES ("' . $nome . '", "' . $autor . '", "' . $editora . '", 
            ' . $anoPublicado . ', ' . $nPags . ', "' . $isbn . '", "' . $rua . '", 
            "' . $estante . '", "' . $prateleira . '", "' . $genero . '", 
            "' . $qtdLivros . '", "' . $arquivo . '");';
    
    if ($conexao->query($cadastrarLivro)) {
        // Successful insertion
        header('Location: catalogo.php'); // Redirect to catalog page
        exit();
    } else {
        // Error in insertion
        echo 'Error: ' . $conexao->error;
    }
    
    $conexao->close();
}
?>
