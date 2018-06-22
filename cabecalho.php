<html>
	<head>	
		<title>Vota Brasil</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>

		<h1>Vota Brasil</h1>
		<img src='urna.png'/>
		<h2>2018</h2>
		<nav>
		<?php

			echo "<a href = 'form_candidato.php'>Cadastro Candidato</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
				
			echo "<a href = 'form_eleitor.php'>Cadastro Eleitor</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
					
			echo "<a href = 'form_partido.php'>Cadastro Partido</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
			
			echo "<a href = 'votacao.php'>Votação</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
			
			echo "<a href = 'Eleitos.php'>Pré-eleitos</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
			
			echo "<a href = 'dados_candidatos.php'>Dados Candidatos</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
			
			echo "<a href = 'dados_eleitores.php'>Dados Eleitores</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
			
			echo "<a href = 'dados_partidos.php'>Dados Partidos</a>";
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			
		?>
		</nav>