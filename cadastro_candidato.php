
		<?php 
		
			include "conexao.php";
			include "cabecalho.php";
			
			$nome = $_POST["nome"];
			$data_nasc = $_POST["data_nasc"];
			$estado = $_POST["estado"];
			$partido = $_POST["partido"];
			$cargo = $_POST["cargo"];
			$insert = "insert into candidato (Nome_candidato, Data_nasc,Cod_estado, Cod_partido, Cod_cargo) 
			values('$nome', '$data_nasc','$estado', '$partido', '$cargo')";
	
			if (mysqli_query($link, $insert)){	//insere os dados acima no BD
			
				header("location:dados_candidatos.php");
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>