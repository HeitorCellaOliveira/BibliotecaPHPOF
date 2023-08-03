<html>
	<head>
	<script>
    //========================================================FORMATAÇÃO DO TELEFONE=========================================//
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
		
		<?php
			include('protect.php');

			$hostname = "127.0.0.1";
			$user = "root";
			$password = "root";
			$database = "biblioteca";
		
			$conexao = new mysqli($hostname, $user, $password, $database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				$nome = $conexao -> real_escape_string($_POST['buscarUser']);

				$sql="SELECT *
				FROM `cadastroalunos`
				WHERE `nome` LIKE '%".$nome."%';";
				
				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0) {
					$row = $resultado -> fetch_array();
					echo '<center>';
					echo '<form action="alunoAtualiza.php" method="POST">';
						echo '<table style="margin-top: 20em;">';
						echo '<tr><td><h1 class="">Atualizar Dados</h1></td></tr>';
						echo '<tr><td>ID:</tr></td>';
						echo '<tr><td><input type="text" name="id" value="'. $row['id'].'" readonly></tr></td>';
						echo '<tr><td><br>Nome do Aluno:</tr></td>';
                        echo '<tr><td><input type="text" name="nome" value="'. $row['nome'].'"></tr></td>';
						echo '<tr><td><br>Turma:</tr></td>';
						echo '<tr><td><input type="text" name="turma" value="'. $row['turma'].'"></tr></td>';
						echo '<tr><td><br>Telefone:</tr></td>';
                        echo '<tr><td><input class="" type="text" name="telefone" id="telefone" onkeyup="formatarTelefone()" value="'. $row['telefone'] .'"></td></tr>';
						echo '<tr><td><br><input type="submit" name="atualizar" value="Atualizar" onclick="return confirm(\'Tem certeza de que deseja atualizar o usuário?\')">
						<a href="buscarAluno.php" style="">Voltar</a></td></tr>';
					echo '</form>';
					echo '</center>';
					$conexao -> close();
                    
                    exit();
				} else {
					
					$conexao -> close();
                    echo 'Nenhum registro encontrado.';
                    echo '<br><br>';
                    echo '<a href="buscarAluno.php" style="">Voltar</a>';
				}
			}
		?>
	</body>
</html>