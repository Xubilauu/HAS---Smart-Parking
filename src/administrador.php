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
		.usuario{
			display: inline-block;
			position: relative;
			top: 20px;
		}
		.seguranca{
			display: inline-block;
			top: 20px;
			position: relative;
			margin-left: 30px;
		}
		.div-button{
			position: relative;
			top: 40px;
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
				<div class="title">ADMINISTRADOR</div>
				<div class="container">
					<br />
					<br />
					<div class="col-8 col-12-medium imp-medium">
						<!-- Content -->
						<div id="content">
							<article class="box post">
								<header class="style1">	
									<h2>Bem-vindo, administrador(a) <?php echo $_SESSION['nome'];?>.</h2>
								</header>			
								<header class="style1">
									<h2>O que você deseja ver?</h2>
									<div class="usuario">
										<a href="usuarios.php"><input class="btn_Ins" type="submit" value="Usuários" type="button" class="btn"></a>
									</div>
									<div class="seguranca">
										<a href="segurancas.php"><input class="btn_Ins" type="submit" value="Seguranças" type="button" class="btn"></a>
									</div><br /><br /><br />
									<div class="estacionamento">
										<a href="entradaesaida.php"><input class="btn_Ins" type="submit" value="Estacionamento" type="button" class="btn"></a>
									</div>
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