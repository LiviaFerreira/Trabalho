
<?php
	include("cabecalho.php");
?>

		<div id="conteudo">
		<form method = "post" action = "cadastro_votacao.php">
		<legend>Eleições 2018</legend>
			<p>
				<label>Título de eleitor: </label>
				<input class="caixa" type = "number" name = "Cod_eleitor" required />
			</p>
			
			<p>
				<label>Voto presidente: </label>
				<input class="caixa" type = "number" name = "Voto_presidente" required />
			</p>
			<p>
				<label>Voto governador: </label>
				<input class="caixa" type = "number" name = "Voto_governador" required />
			</p>
			<p>
				<label>Voto Deputado Federal: </label>
				<input class="caixa" type = "number" name = "Voto_federal" required />
			</p>
			<p>
				<label>Voto Deputado Estadual: </label>
				<input class="caixa" type = "number" name = "Voto_estadual" required />
			</p>
			<p>
				<label>Voto Senador: </label>
				<input class="caixa" type = "number" name = "Voto_senador" required />
			</p>
		
		
			<p>
				<input class="botao_reset" type = "reset" value = "Limpar" />
				<input class="botao_submit" type = "submit" value = "Enviar" />
			</p> 
		</form>
		</div>
	</body>

</html>