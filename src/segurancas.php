<?php
	session_start();
    include_once('../includes/funcoes.php');
	$logado = $_SESSION['logado'];

	$consulta = mysqli_query($conexao, "SELECT * FROM seguranca");
	$dados = mysqli_fetch_all($consulta);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>HAS SMART PARKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css"/>
		<link rel="stylesheet" href="../assets/css/tabela.css"/>
		<script type='text/javascript' src="../assets/js/formatacoes.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<style>	
		.div-button{
			display: inline-block;
			position: relative;
			top: 40px;
		}
		.button {
			background-color: white;
			color: black;
			border: 2px solid gray;
		}
		
		table {
		border-collapse: collapse;
		vertical-align: middle;
		margin-left: 198px;
		}

		th, td {
			text-align: center;
			vertical-align: middle;
			padding: 3px;
		}

		tr:nth-child(even){background-color: #f2f2f2}
		tr:hover {background-color: #E0E0E0;}

		th {
			background-color: #A5A5A5;
			color: white;
		}
		
		.add {
			color: white;
		}

		</style>
	</head>
	<body class="segmentos">
		<div id="page-wrapper">
		<?php 
			include_once('../includes/menu.php');
		?>
			<!-- Main -->
			<section id="main" class="wrapper style2">
				<div class="title">ADMINISTRADOR</div>
				<div class="container">
					<div class="col-8 col-12-medium imp-medium">
						<!-- Content -->
						<div id="content">
							<article class="box post">
							<br /><br />
								<header class="style1">	
									<div><b>Seguranças</b></div>
								</header>			
								<header class="style1">
									<div class="div_table">
										<table class="table">
											<tr>
												<th>Código</th>
												<th>Nome</th>
												<th>Login</th>
												<th>Telefone</th>
												<th colspan="2"><a href="inserirseguranca.php" class="add">Adicionar</a></th>
											</tr>
											<?php foreach ($dados as $linha):?>
											<tr>
												<td><?php echo $linha[0]; ?></td>
												<td><?php echo $linha[1]; ?></td>
												<td><?php echo $linha[2]; ?></td>
												<td><?php echo (formatarFoneSeg($linha));?></td>
												<td><a name="altera" href="alterar.php?Alterar=seguranca&Segid=<?php echo $linha[0];?>">Alterar</a></td>
												<td><a name="excluir" href="processaexcluir.php?Excluir=seguranca&Segid=<?php echo $linha[0];?>">Excluir</a></td>
											</tr>
											<?php endforeach;?>
										</table>
									</div>
									<div class="div-button">
										<a href="administrador.php"><button class="button style1" type="button">Voltar</button></a>
										<a href="logout.php"><button class="button style1" type="button">Sair</button></a>
									</div>
								</header>
							</article>
						</div>
					</div>
				</div>
				<br />
				<br />	
			</section>
			<?php 
				include_once('../includes/footer.php');
			?>
		</div>
	</body>
</html>
