<?php
	include("cabecalho.php");
	
	include("conexao.php");
	
	$Nome_partido = $_POST["Nome_partido"];
	$Sigla = $_POST["Sigla"];
	

	
	$insert = "INSERT INTO partido(Nome_partido,Sigla)
									VALUES('$Nome_partido','$Sigla')";
				
	
	mysqli_query($link, $insert) or die(mysqli_error($link)); 
	echo"<div id='conteudo'>	";
	echo "<h3>Cadastro realizado com sucesso.</h3>";
	echo"</div>	";
?>