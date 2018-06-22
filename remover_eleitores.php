<?php
	include ("cabecalho");
	include ("conexao.php");
	$valor = $_GET["id"];
	
	$delete = "DELETE FROM eleitor WHERE Id_eleitor=$valor";
	
	if(mysqli_query($link, $delete)){
		header("Location: dados_eleitores.php");
	}else{
		echo"<div id='conteudo'>";
		echo "Nao é possivel remover essa informação.<br />" . mysqli_error($link). "<br />
		<br />
		<a href='dados_eleitores.php'>Voltar</a>
		";
		echo"</div>";
	}
?>
</body>
</html>