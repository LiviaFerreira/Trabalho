
	
	<?php include "cabecalho.php"; ?>
		
		<div id='conteudo'>
		<form action="cadastro_eleitor.php" method="post">

				<legend>Entrada de Dados</legend>
				
				<label>Nome: </label>
				<input class="caixa" type="text" name="nome" required/>
				<br />
				<br />
				
				<label>CPF: </label>
				<input class="caixa" type="number" min="10000000000" max="99999999999" name="cpf" required/>
				<br />
				<br />
				
				<label>Data de Nascimento: </label>
				<input class="caixa" type="date" name="data_nasc" required/>
				<br />
				<br />
				
				<label>Estado: </label>
				<select class="caixa" name="estado" required>
					<?php
						include "conexao.php";
						
						
						$select = "select * from estado";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error);
						
						while($linha = mysqli_fetch_array($resultado)){
							
							echo "<option value='" . $linha["Id_estado"] . "'> " . $linha["UF"] . "</option>";
							
						}
					?>
				</select>
				<br />
				<br />
				<input class="botao_reset" type="reset" value="Limpar"/>
				<input class="botao_submit" type="submit" value="Enviar"/>
			
		</form>
		</div>
	</body>
</html>