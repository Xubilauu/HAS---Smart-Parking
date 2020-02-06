<?php
	session_start();
	include_once('../includes/funcoes.php');
    $consulta = mysqli_query($conexao, "SELECT ent_saida.USU_INT_ID, usuario.USU_STR_NOM, DATE_FORMAT(ENT_DATE_DAT, '%d/%m/%Y'), ENT_TIME_HR, veiculo.VEI_STR_PLA, DATE_FORMAT(SAI_DATE_DAT, '%d/%m/%Y'), SAI_TIME_HR FROM ent_saida 
    INNER JOIN usuario ON usuario.USU_INT_ID = ent_saida.USU_INT_ID
    INNER JOIN veiculo ON veiculo.USU_INT_ID = usuario.USU_INT_ID ORDER BY usuario.USU_INT_ID ASC");
	$dados = mysqli_fetch_all($consulta);;
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
		margin-left: 196px;
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
									<div><b>Horários</b></div>
								</header>			
								<header class="style1">
									<div class="div_table">
										<table class="table">
											<tr>
												<th rowspan="2">Código</th>
												<th rowspan="2">Nome</th>
												<th rowspan="2">Placa</th>
												<th colspan="2">Entrada</th>
												<th colspan="2">Saída</th>
											</tr>
											<tr>
												<th>Data de entrada</th>
												<th>Hora de entrada</th>
												<th>Data de saída</th>
												<th>Hora de saída</th></td>
											</tr>
											<?php foreach ($dados as $linha):?>
											<tr>
												<td><?php echo $linha[0];?></td>
												<td><?php echo $linha[1];?></td>
												<td><?php echo exibePlaca($linha);?></td>
												<td><?php echo $linha[2];?></td>
												<td><?php echo $linha[3];?></td>
												<td><?php 
												if ($linha[5] == NULL){
													echo "-";
												} else{
													echo $linha[5];}?>
												</td>
												<td>
												<?php 
													if ($linha[6] == NULL){
														echo "-";
													} else{
														echo $linha[6];
													}
												?>
												</td>
											</tr>
											<?php endforeach; ?>
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
