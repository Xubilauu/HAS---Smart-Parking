<!DOCTYPE HTML>
<html>
	<head>
		<title>HAS SMART PARKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="../imagem/png" href="../images/meufavicon.png" />
		<style>
			.btn_submit{
				position: absolute;
				left: 43.5%;
			}	
		</style>
	</head>
	<body class="login">
		<div id="page-wrapper">
			<?php 
				include_once('../includes/menu.php');
				session_start();
				if (!isset($_SESSION['erro'])){
					$_SESSION['erro'] = 0;
				}
			?>
			<!-- Highlights -->
				<section id="highlights" class="wrapper style3">
					<div class="title" id="titulo">LOGIN</div>
					<div class="adm"></div>
					<div class="container">
						<div class="row aln-center">
							<form id="formulario" method="POST" action="processalogin.php">
								<h2>Login:</h2>
								<input class="campo_nome" type="text" name="username" placeholder="Insira aqui seu Login"><br>
								<h2>Senha:</h2>
								<input class="campo_inicio" type="password" name="senha" placeholder="Insira aqui sua Senha"></br>
								<?php
									if ($_SESSION['erro'] != 0){
										echo ('<p>Os dados estão incorretos, tente novamente...</p>');
										unset($_SESSION['message']);
									}
								?>
								<input class="btn_submit" name="enviar" type="submit" value="Enviar">
							</form>
						</div>
					</div>
					<br />
					<br />
					<br />
					<br />
				</section>
		</div>
		<?php 
			include_once('../includes/footer.php');
		?>
	</body>
</html>
