<?php
	session_start();
    include_once('../includes/funcoes.php');
	$logado = $_SESSION['logado'];
	$consulta = mysqli_query($conexao, "SELECT * FROM usuario AS u INNER JOIN veiculo AS v ON u.USU_INT_ID = v.USU_INT_ID ");
	$dados = mysqli_fetch_all($consulta);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>HAS SMART PARKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" http-equiv="refresh" content="width=device-width, initial-scale=1, user-scalable=no"/>
		<meta http-equiv="refresh" content="10; url="<?php echo $_SERVER['PHP_SELF']; ?>">
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
		margin-left: 190px;
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
			<?php if ($logado == 1){
				echo ('<div class="title">ADMINISTRADOR</div>');
			} else {
				echo ('<div class="title">SEGURANÇA</div>');
			}?>
				<div class="container">
					<div class="col-8 col-12-medium imp-medium">
						<!-- Content -->
						<div id="content">
							<article class="box post">
								<header class="style1">
								<br /><br />	
									<div><b>Usuários</b></div>
								</header>			
								<header class="style1">
									<div class="div_table">
										<table class="table">
											<tr>
												<th>Código</th>
												<th>Nome</th>
												<th>Telefone</th>
												<th>Tipo</th>
												<th>Placa</th>
												<th>Modelo</th>
												<th>Cor</th>
												<th>Fabricante</th>
												<?php if ($logado == 1){
													echo('<th colspan="2"><a href="inserirusuario.php" class="add">Adicionar</a></th>');
												}?>
											</tr>
											<?php foreach ($dados as $linha):?>
											<tr>
												<td><?php echo $linha[0];?></td>
												<td><?php echo $linha[1];?></td>
												<td><?php echo (formatarFoneUsu($linha));?></td>
												<td><?php echo $linha[3];?></td>
												<td><?php echo (exibePlaca($linha));?></td>
												<td><?php echo $linha[5];?></td>
												<td><?php echo $linha[6]; ?></td>
												<td><?php echo $linha[7];?></td>
												<?php if ($logado == 1){?> 
													<td><a name="altera" href="alterar.php?Alterar=usuario&Usuid=<?php echo $linha[0];?>">Alterar</a></td>
													<td><a name="excluir" href="processaexcluir.php?Excluir=usuario&Usuid=<?php echo $linha[0];?>">Excluir</a></td>
											</tr>
											<?php } endforeach; ?>
										</table>
									</div>
									<div class="div-button">
										<?php if ($logado == 1){
											echo ('<a href="administrador.php"><button class="button style1" type="button">Voltar</button></a>');
										} elseif ($logado == 2){
											echo ('<a href="seguranca.php"><button class="button style1" type="button">Voltar</button></a>');
										}?>
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
