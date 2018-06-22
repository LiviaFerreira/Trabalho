
	
	<?php include "cabecalho.php"; ?>
	
		<div id="conteudo">
		<form action="cadastro_candidato.php" method="post">
			
				<legend>Entrada de Dados</legend>
				
				<label>Nome: </label>
				<input class="caixa" type="text" name="nome" required/>
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
				<label>Cargo: </label>
				<select class="caixa" name="cargo" required>
					<?php
						include "conexao.php";
						
						
						$select = "select * from cargo";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error);
						
						while($linha = mysqli_fetch_array($resultado)){
							
							echo "<option value='" . $linha["Id_cargo"] . "'> " . $linha["Nome_cargo"] . "</option>";
							
						}
					?>
				</select>
				<br />
				<br />
				<label>Partido: </label>
				<select class="caixa" name="partido" required>
					<?php
						include "conexao.php";
						
						
						$select = "select * from partido";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error);
						
						while($linha = mysqli_fetch_array($resultado)){
							
							echo "<option value='" . $linha["Id_partido"] . "'> " . $linha["Sigla"] . "</option>";
							
						}
					?>
				</select>
				<br />
				<br />
		
				<input  class="botao_reset" type="reset" value="Limpar"/>
				<input class="botao_submit" type="submit" value="Enviar"/>
			
		</form>
		</div>
	</body>
</html>