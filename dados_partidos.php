
	<?php

		include("cabecalho.php");

		include("conexao.php");

			echo"
				<div id='lista'>
				<form method = 'post' action = 'dados_partidos.php'>
					<legend>Lista Partido</legend>
					<p>
						<label>Nome partido:</label>
						<input class='caixa'type='text' name='filtro_partido' id='filtro_partido'/>
					</p>
					<p>
						<label>Ordenar por:</label>
						<input type = 'radio' name = 'radio' value = 'ASC'/> Nome A-Z:
						<input type = 'radio' name = 'radio' value = 'DESC'/> Sigla A-Z:
					</p>
					
					<br>
					

					
					<input class='botao_reset' type = 'reset' value = 'Limpar'/>
					<input class='botao_submit' type = 'submit' value = 'Enviar'/>
					
					
				</form>
				</div>
			
		";
		
		$select = "select * from partido ";

		
		if(!empty($_POST)){
		
			if(isset($_POST["filtro_partido"])){
				$filtro_partido= $_POST["filtro_partido"];
				$select .= " WHERE Nome_partido LIKE '%$filtro_partido%'";
			}


			if(!empty($_POST["radio"])){
				$radio = $_POST["radio"];			
				$select .= " ORDER BY Nome_partido $radio";
			}		
		
		}
				
		
					
		$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
		
		echo "
			
				<table border='1'>
				
					<tr>
						<th>Nome</th>
						<th>Sigla</th>								
					</tr>
			
		";
		
		while($linha = mysqli_fetch_array($resultado)){
			
			echo "
				
				<tr>
					<td>$linha[Nome_partido]</td>
					<td>$linha[Sigla]</td>
					
				</tr>
				
			";
			
		}
		
		echo "
				</table>
				
				</body>
		
		";
					
	?>
	</body>
</html>