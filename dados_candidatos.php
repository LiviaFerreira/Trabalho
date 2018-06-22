
<?php

	include("cabecalho.php");

	include("conexao.php");

		echo"
		<div id='lista'>
			
			<form method = 'post' action = 'dados_candidatos.php'>
				<legend>Lista Candidato</legend>	
				<p>
					<label>Nome do Candidato:</label>
					<input class='caixa' type='text' name='filtro_candidato' id='filtro_candidato'/>
				</p>
				<p>
					<label>Ordenar por:</label>
					<input type = 'radio' name = 'radio' value = 'ASC'/> Nome A-Z:
					<input type = 'radio' name = 'radio' value = 'DESC'/> Estado A-Z:
				</p>
				<label>Cargo: </label>
			
				<select name='filtro_cargo' class='caixa'>
				<option value=''>:SELECIONE:</option>";
					
										
						
						$select = "select * from cargo";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error);
						
						while($linha = mysqli_fetch_array($resultado)){
							
							echo "<option value='" . $linha["Id_cargo"] . "'> " . $linha["Nome_cargo"] . "</option>";
							
						}
				
					echo"
				</select>
				

				<p>
					<input class= 'botao_reset' type = 'Reset' value = 'Limpar'/>
					<input class= 'botao_submit' type = 'submit' value = 'Enviar'/>
				</p>
				
						</form>
					</div>
					
				";
	
	$select = "select * from candidato
	inner join partido 
	on candidato.Cod_partido = partido.Id_partido 
	inner join cargo
	on candidato.Cod_cargo = cargo.Id_cargo
	inner join estado 
	on candidato.Cod_estado=estado.Id_estado" ;

	
	if(!empty($_POST)){
		$cont=0;
		if(isset($_POST["filtro_candidato"])){
			$filtro_candidato= $_POST["filtro_candidato"];
			$select .= " WHERE Nome_candidato LIKE '%$filtro_candidato%'";
			$cont++;
		}

		
		if(!empty($_POST["filtro_cargo"])){
			
			$filtro_cargo= $_POST["filtro_cargo"];
			if($cont==0){
				$select .= " WHERE cod_cargo = '$filtro_cargo'";
			}
			else{
				$select .= " AND cod_cargo = '$filtro_cargo'";
			}
		}
		
		
		if(!empty($_POST["radio"])){
			$radio = $_POST["radio"];			
			$select .= " ORDER BY $radio";
		}
	
	}
			
	
				
	$resultado2 = mysqli_query($link,$select) or die(mysqli_error($link));
	
	echo "
		
			<table border='1'>
			
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Partido</th>
					<th>Estado</th>
					<th>Cargo</th>
					<th>D.nascimento</th>
				
													
				</tr>
		
	";
	
	while($linha = mysqli_fetch_array($resultado2)){
		
		echo "
			
			<tr>
				<td>$linha[Id_candidato]</td>
				<td>$linha[Nome_candidato]</td>
				<td>$linha[Nome_partido]</td>
				<td>$linha[Nome_estado]</td>
				<td>$linha[Nome_cargo]</td>
				<td>$linha[Data_nasc]</td>
				
			

			</tr>
			
		";
		
	}
	
	echo "
			</table>
			
			</body>
	
	";
				
?>
</head>