<!DOCTYPE HTML>
<html>
	<?php
	    session_start();
		include_once('../includes/funcoes.php');
        $logado = 	$_SESSION['logado'];
	?>
	<head>
		<title>HAS SMART PARKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="imagem/png" href="../images/meufavicon.png" />
		<script type='text/javascript' src="../assets/js/formatacoes.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style>
			.div-button{
				  float: left;
				  font-color: #919499;
			}
			.btn_submit{
				color: #919499;
				font: 
			}
		</style>
	</head>
    
	<body class="login">
		<div id="page-wrapper">
            <?php include_once('../includes/menu.php');?>
			<!-- Highlights -->
				<section id="highlights" class="wrapper style3">
					<div class="title" id="titulo">Cadastro de seguranças</div>
					<div class="container">
						<div class="row aln-center">
							<form id="formulario" method="POST" action="processainserir.php">
								<h2>Nome:</h2>
								<input class="campo_nome" type="text" name="username" placeholder="Insira aqui o nome" required/><br />
                                <h2>Login:</h2>
								<input class="campo_login" type="text" name="login" placeholder="Insira aqui o login" required/><br />
								<h2>Senha:</h2>
								<input class="campo_senha" type="password" name="senha" placeholder="Insira aqui uma senha" required/><br />
                                <h2>Telefone:</h2>
								<input class="campo_telefone" type="text" name="tel" placeholder="Insira aqui o telefone" required/><br />
								<?php
								if(isset($_SESSION['erro'])){
									switch ($_SESSION['erro']){
										case 1:
											echo ('<p>Os dados estão incorretos, tente novamente...</p>');
										break;
										case 2:
											echo ('<p>Você inseriu um telefone inválido, tente novamente...</p>');
										break;
									}
								}
								?>
								<div class="div-button">
									<a href="segurancas.php"><button class="btn_submit" type="button">Voltar</button></a>
									<input class="btn_submit" name="enviar" type="submit" value="Enviar" onClick="
									<?php $_SESSION['insere'] = 'seguranca';?>">
								</div>
							</form>
						</div>
					</div>
					<br />
				</section>
		</div>
		<?php 
			include_once('../includes/footer.php');
		?>
	</body>
	<script>
		mascaraTelefone(formulario.tel);
	</script>
</html>