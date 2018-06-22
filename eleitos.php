
<?php

	include("cabecalho.php");

	include("conexao.php");

	echo"<div id='presidente'>
		<form method = 'post' action = 'eleitos.php'>
				<legend>Pré-eleitos</legend>	
				<label>Estado: </label>
				<select class='caixa' name='estado' required>
				<option value=''>:SELECIONE:</option>";
										
						
						$select = "select * from estado";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error);
						
						while($linha = mysqli_fetch_array($resultado)){
							
							echo "<option> " . $linha["UF"] . "</option>";
							
						}
				echo"
				</select>
				<p>
		<input class= 'botao_reset' type = 'Reset' value = 'Limpar'/>
		<input class= 'botao_submit' type = 'submit' value = 'Enviar'/>
				</p>
				
		</form>";
		
	$select =" SELECT Nome_candidato AS candidato, COUNT( candidato.Id_candidato ) AS qtdPresidente
					FROM  `candidato` 
					INNER JOIN votacao ON candidato.Id_candidato = votacao.Voto_presidente		
					GROUP BY candidato.Id_candidato
					ORDER BY qtdPresidente DESC Limit 1
			";
	$resultado=mysqli_query($link, $select);
	$i=mysqli_num_rows($resultado);
		if($i>0){
			
			
					$linha = mysqli_fetch_array($resultado);
					echo"</br>";
						echo"<p>Presidente da Repúplica:".$linha['candidato']."</p>";
					echo"</div>";
		}else{
			echo"<div id='presidente'>";
			echo"</br>";
			 echo"<p>Presidente da Repúplica: Não eleito(a)</p>";
			 echo"</div>";
		}
		// Governador 
		if(isset($_POST["estado"])) {
			$estado[0] = $_POST["estado"];
		} else {
			$select_estado="Select* from estado ";
			$resultado_estado=mysqli_query($link, $select_estado);
			while($linha=mysqli_fetch_array($resultado_estado)){
				$estado[]=$linha['UF'];
			}
		}
	
	
	echo "<table>									
							<tr>
								<th>Governador do estado</th>
								<th>Estado/Sigla</th>					
							</tr>";
							
	foreach($estado as $e){	
		$select_governador= "SELECT Nome_candidato AS candidato, COUNT( candidato.Id_candidato ) AS qtdGovernador
						FROM  `candidato` 
						INNER JOIN votacao ON candidato.Id_candidato = votacao.Voto_governador
						INNER JOIN estado ON candidato.Cod_estado = estado.Id_estado and estado.UF Like '$e'
						
						GROUP BY candidato.Id_candidato
						ORDER BY qtdGovernador DESC Limit 1	";
						
		$resultado_governador=mysqli_query($link, $select_governador);

						
		$i_gov=mysqli_num_rows($resultado_governador);					
			if($i_gov>0){					
				$linha = mysqli_fetch_array($resultado_governador);		
								
				echo "									
					<tr>
						<td>$linha[candidato]</td>
						<td>$e</td>										
					</tr>
				";
			}else{						
				echo "									
					<tr>
						<td><b>Não há votos para governador neste estado.</td>
						<td>$e</td>										
					</tr>
				";
			}
	}
	echo "</table>";
	echo "
									<table>									
										<tr>
											<th>Deputado Federal</th>
											<th>Estado/Sigla</th>					
										</tr>								
		";

	 //Federal							
			
	foreach($estado as $e){	
	$select_deputado_federal= "SELECT Nome_candidato AS candidato, COUNT( candidato.Id_candidato ) AS qtdDeputadoFederal
					FROM  `candidato` 
					INNER JOIN votacao ON candidato.Id_candidato = votacao.Voto_federal
					INNER JOIN estado ON candidato.Cod_estado = estado.Id_estado and estado.UF Like '$e'
					
					GROUP BY candidato.Id_candidato
					ORDER BY qtdDeputadoFederal DESC Limit 1		";
					$resultado_deputado_federal=mysqli_query($link, $select_deputado_federal);
					$i_df=mysqli_num_rows($resultado_deputado_federal);					
						if($i_df>0){									
								$linha = mysqli_fetch_array($resultado_deputado_federal);							
									echo "									
										<tr>				
											<td>$linha[candidato]</td>
											<td>$e</td>										
										</tr>
									";																
							}else{	
								echo "									
										<tr>				
											<td>Deputado Federal não cadastrado</td>
											<td>$e</td>										
										</tr>
									";		
							}
	}
	echo "
										</table>	
			
	";
						
//Deputado Estadual						
		echo "
									<table>									
										<tr>
											<th>Deputado Estadual</th>
											<th>Sigla</th>					
										</tr>								
							";
	foreach($estado as $e){	
	$select_deputado_estadual= "SELECT Nome_candidato AS candidato, COUNT( candidato.Id_candidato ) AS qtdDeputadoEstadual
					FROM  `candidato` 
					INNER JOIN votacao ON candidato.Id_candidato = votacao.Voto_estadual
					INNER JOIN estado ON candidato.Cod_estado = estado.Id_estado and estado.UF Like '$e'
					
					GROUP BY candidato.Id_candidato
					ORDER BY qtdDeputadoEstadual DESC Limit 1		";
					$resultado_deputado_estadual=mysqli_query($link, $select_deputado_estadual);
										
					$i_de=mysqli_num_rows($resultado_deputado_estadual);						
						if($i_de>0){									
								$linha = mysqli_fetch_array($resultado_deputado_estadual);								
									echo "									
										<tr>
											<td>$linha[candidato]</td>
											<td>$e</td>										
										</tr>
									";								
								
							}else{	
								echo "									
										<tr>
											<td>Deputado Estadual não cadastrado</td>
											<td>$e</td>										
										</tr>
									";	
							}
	}
							echo "
								</table>	
									";
//Senador					
	echo "
									<table>									
										<tr>
											<th>Senador</th>
											<th>Estado/Sigla</th>					
										</tr>								
							";
	foreach($estado as $e){	
	$select_senador= "SELECT Nome_candidato AS candidato, COUNT( candidato.Id_candidato ) AS qtdSenador
					FROM  `candidato` 
					INNER JOIN votacao ON candidato.Id_candidato = votacao.Voto_estadual
					INNER JOIN estado ON candidato.Cod_estado = estado.Id_estado and estado.UF Like '$e'
					
					GROUP BY candidato.Id_candidato
					ORDER BY qtdSenador DESC Limit 1		";
					$resultado_senador=mysqli_query($link, $select_senador);
					$i_s=mysqli_num_rows($resultado_senador);						
						if($i_s>0){							
							
								$linha = mysqli_fetch_array($resultado_senador);							
									echo "									
										<tr>
											<td>$linha[candidato]</td>
											<td>$e</td>										
										</tr>
									";								
								
							}else{	
								echo"
											<td>Senador não cadastrado</td>
											<td>$e</td>										
										</tr>
									";
							} 	
	}
	echo "
										</table>	
	";
	
	
									
					
						
				
?>
</body>
</html>