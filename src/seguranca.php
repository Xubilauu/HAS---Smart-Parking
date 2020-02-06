<?php
	session_start();
	include_once('../includes/funcoes.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>HAS SMART PARKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<style>
			.botoes{
				margin-left: 43px;
			}
			.button {
				background-color: white;
				color: black;
				border: 2px solid gray;
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
				<div class="title">Segurança</div>
				<div class="container">
					<br />
					<br />
					<div class="col-8 col-12-medium imp-medium">
						<!-- Content -->
						<div id="content">
							<article class="box post">
								<header class="style1">	
									<h2>Bem-vindo, segurança <?php echo $_SESSION['nome'];?>.</h2>
								</header>			
								<header class="style1">
									<div class="botoes">
										<a href="usuarios.php"><input class="btn_Ins" type="submit" value="Usuários" type="button" class="btn"></a>
										<a href="entradaesaida.php"><input class="btn_Ins" type="submit" value="Estacionamento" type="button" class="btn"></a>
									</div>
									<br /><br />
									<div class="div-button">
										<a href="logout.php">
											<button class="button" type="button">Sair</button>
										</a>
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