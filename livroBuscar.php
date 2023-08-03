<html>
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
				$nome = $conexao -> real_escape_string($_POST['buscaBook']);

				$sql="SELECT *
				FROM `acervo`
				WHERE `nome` LIKE '%".$nome."%';";
				
				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0) {
					$row = $resultado -> fetch_array();
					echo '<center>';
					echo '<form action="livroAtualiza.php" method="POST">';
						echo '<table style="margin-top: 10em;">';
						echo '<tr><td><h1 class="">Atualizar Dados</h1></td></tr>';
						echo '<tr><td>ID:</td></tr>';
						echo '<tr><td><input type="text" name="id" value="'. $row['id'].'" readonly></tr></td>';
						echo '<tr><td><br>Nome:</tr></td>';
						echo '<tr><td><input type="text" name="nome" value="'. $row['nome'].'"></tr></td>';
						echo '<tr><td><br>Gênero:</tr></td>';
						echo '<tr><td><input type="text" name="genero" value="'. $row['genero'].'"></tr></td>';
						echo '<tr><td><br>Autor:</tr></td>';
						echo '<tr><td><input type="text" name="autor" value="'. $row['autor'].'"></tr></td>';
						echo '<tr><td><br>Ano Publicado:</tr></td>';
						echo '<tr><td><input type="text" name="anoPublicado" value="'. $row['anoPublicado'].'"></tr></td>'; 
						echo '<tr><td><br>Sinopse:</tr></td>';
						echo '<tr><td><textarea name="sinopse">'. $row['sinopse'].'</textarea></tr></td>';
						echo '<tr><td><br>Quantidade de Livros:</tr></td>';
						echo '<tr><td><input type="text" name="qtdLivros" value="'. $row['qtdLivros'].'"></tr></td>';
						echo '<tr><td><br><input type="submit" name="atualizar" value="Atualizar" onclick="return confirm(\'Tem certeza de que deseja atualizar o livro?\')">
						<a href="buscarLivro.php" style="">Voltar</a></tr></td>';
					echo '</form>';
					echo '</center>';
					$conexao -> close();
                    exit();
				} else {
					
					$conexao -> close();
                    echo 'Nenhum registro encontrado.';
                    echo '<br><br>';
                    echo '<a href="buscarLivro.php" style="">Voltar</a>';
				}
			}
		?>
	</body>
</html>