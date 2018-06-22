
<?php

	include("cabecalho.php");

	include("conexao.php");

		echo"
			<div id='lista'>
			<form method = 'post' action = 'dado_do_eleitor.php'>
				<legend>Lista Eleitor</legend>
					
				<p>
					<label>Digite seu CPF:</label>
					<input class='caixa' type='text' name='filtro_eleitor' id='filtro_eleitor'/>
				
				<input  type = 'submit' value = 'Filtrar'/>
				</p>
				
			</form>
			<form method='post' action='dados_eleitores.php'>
				<p>
					<label>Ordenar por:</label>
					<input type = 'radio' name = 'radio' value = 'ASC'/> Nome A-Z:
					<input type = 'radio' name = 'radio' value = 'DESC'/> Estado A-Z:
				</p>
				
				<br>
				

				
				<input class='botao_reset' type = 'Reset' value = 'Limpar'/>
				<input class='botao_submit' type = 'submit' value = 'Enviar'/>
				
				
			</form>
			</div>
		
	";
	
	$select = "select * from eleitor inner join estado on eleitor.Cod_estado = estado.Id_estado ";

	
	if(!empty($_POST)){
	
		
		if(!empty($_POST["radio"])){
			$radio = $_POST["radio"];			
			$select .= " ORDER BY CPF $radio";
		}		
	
	}
	
				
	$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
	
	echo "
		
			<table border='1'>
			
				<tr>
					<th>Nome</th>
					<th>Estado</th>
					<th>D.nascimento</th>
					<th>Remover</th>
													
				</tr>
		
	";
	
	while($linha = mysqli_fetch_array($resultado)){
		
		echo "
			
			<tr>
				<td>$linha[Nome_eleitor]</td>
				<td>$linha[Nome_estado]</td>
				<td>$linha[Data_nasc]</td>
				
				<td>

					<a class='acao' href='remover_eleitores.php?id=$linha[Id_eleitor]'>remover</a>
				</td>

			</tr>
			
		";
		
	}
	
	echo "
			</table>
			
			</body>
	
	";
				
?>
</html>