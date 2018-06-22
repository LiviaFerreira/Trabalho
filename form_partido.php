
<?php
	include("cabecalho.php");
?>

		<div id="conteudo">
	
			<form method = "post" action = "cadastro_partido.php">
			<legend>Cadastro Partido</legend>
				<p>
					<label>Nome: </label>
					<input class="caixa" type = "text" name = "Nome_partido" required />
				</p>
				
				<p>
					<label>Sigla: </label>
					<input class="caixa" type = "text" name = "Sigla" required />
				</p>
			
				<p>
					<input class="botao_reset" type = "reset" value = "Limpar" />
					<input class = "botao_submit" type="submit" value = "Enviar" />
				</p>
			</form>
			</div>
			
			<div>
		</body>
	
</html>