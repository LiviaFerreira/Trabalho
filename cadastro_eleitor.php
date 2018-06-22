
		<?php 
		
			include "conexao.php";
			include "cabecalho.php";
			
			$cpf = $_POST["cpf"];
			$select="select CPF from eleitor where CPF like '$cpf'";
			$resultado=mysqli_query($link, $select);
			
			if(!$resultado->num_rows){
				$nome = $_POST["nome"];
				$data_nasc = $_POST["data_nasc"];
				$estado = $_POST["estado"];
				$insert = "insert into eleitor (Nome_eleitor, CPF, Data_nasc, Cod_estado) 
				values('$nome', '$cpf', '$data_nasc', '$estado')";
		
				if (mysqli_query($link, $insert)){	//insere os dados acima no BD
					echo"<div id='conteudo'>	";
					echo"<h3>Seu título de eleitor é:</h3>".mysqli_insert_id($link);
					echo"</div>	";
				}else{
					die(mysqli_error($link));
				}
			}else{
				echo"<div id='conteudo'>	";
				echo"<h3>Já existente título de eleitor no CPF".$cpf."</h3>";
				echo"</div>	";
			}
		?>
	</body>
</html>