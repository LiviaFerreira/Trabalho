<?php
	include("cabecalho.php");
	
	include("conexao.php");
	
	$Cod_eleitor = $_POST["Cod_eleitor"];
	$Voto_presidente = $_POST["Voto_presidente"];
	$Voto_governador= $_POST["Voto_governador"];
	$Voto_federal = $_POST["Voto_federal"];
	$Voto_estadual = $_POST["Voto_estadual"];
	$Voto_senador= $_POST["Voto_senador"];
	
	$select="select Id_eleitor from eleitor where Id_eleitor like '$Cod_eleitor'";
			$resultado=mysqli_query($link, $select);
			
			if(mysqli_num_rows($resultado)==0){
				$insert = "INSERT INTO votacao(Cod_eleitor,Voto_presidente,Voto_governador,Voto_federal,
									Voto_estadual,Voto_senador)
									VALUES('$Cod_eleitor','$Voto_presidente','$Voto_governador',
									'$Voto_federal','$Voto_estadual','$Voto_senador')";
					mysqli_query($link, $insert) or die(mysqli_error($link)); 
				echo"<div id='conteudo'>	";
				echo "<h3>Voto efetuado com sucesso.</h3>";
				echo"</div>	";

			}else{		
				echo"<div id='conteudo'>	";
				echo "<h3>Você já votou! Não pode votar duas vezes.</h3>";
				echo"</div>	";
			}
	


?>