<!DOCTYPE HTML>
<html>
	<?php 
		session_start();
		include_once('../includes/funcoes.php');
		$logado = $_SESSION['logado'];

		if (isset($_GET['Alterar'])){
			$_SESSION['alterar'] = $_GET['Alterar'];
			$alterar = $_SESSION['alterar'];
		} else {
			$alterar = $_SESSION['alterar'];
		}
		
		if($alterar == 'usuario'){
			if (isset($_GET['Usuid'])){
				$_SESSION['id'] = $_GET['Usuid'];
				$id = $_SESSION['id'];
			} else {
				$id = $_SESSION['id'];
			}
			$consulta = mysqli_query($conexao, "SELECT * FROM usuario AS u INNER JOIN veiculo AS v ON u.USU_INT_ID = v.USU_INT_ID WHERE v.USU_INT_ID = $id");
			$dados = mysqli_fetch_all($consulta);
			$linha[2] = $dados[0][2];
			$linha[4] = $dados[0][4];
		} elseif($alterar == 'seguranca'){
			if (isset($_GET['Segid'])){
				$_SESSION['id'] = $_GET['Segid'];
				$id = $_SESSION['id'];
			} else {
				$id = $_SESSION['id'];
			}
			$consulta = mysqli_query($conexao, "SELECT * FROM seguranca WHERE SEG_INT_ID = $id");
			$dados = mysqli_fetch_all($consulta);
			$linha[4] = $dados[0][4];
		}
		
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
				padding: 10px 24px;
  				float: left;
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
					<div class="title" id="titulo">Alterar</div>
					<div class="container">
						<div class="row aln-center">
							<form id="formulario" method="POST" action="processaalterar.php">
								<?php if($alterar == 'usuario'){?>
									<input type="hidden" name="hidden" value="usuario"/>
									<h2>Nome:</h2>
									<input class="campo_nome" type="text" name="username" placeholder="Insira aqui o nome" value="<?php echo($dados[0][1]);?>" /><br />
									<h2>Telefone:</h2>
									<input class="campo_telefone" type="text" minlength="13" name="tel" placeholder="Insira aqui o telefone" value="<?php echo(formatarFoneUsu($linha));?>" required/><br />
									<h2>Tipo de usuário:</h2>
									<select name="tipo">
										<option>Civil</option>
										<option>Professor</option>
										<option>Segurança</option>
										<option>Policial</option>
										<option>Entregador</option>
									</select>
									<br />
									<h2>Placa:</h2>
									<input class="campo_placa" type="text" name="placa" placeholder="Insira aqui a placa" value="<?php echo (exibePlaca($linha));?>"/><br />
									<h2>Modelo:</h2>
									<input class="campo_modelo" type="text" name="modelo" placeholder="Insira aqui o modelo" value="<?php echo($dados[0][5])?>"/><br />
									<h2>Cor:</h2>
									<input class="campo_cor" type="text" name="cor" placeholder="Insira aqui a cor" value="<?php echo($dados[0][6])?>"/><br />
									<h2>Fabricante:</h2>
									<input class="campo_fabricante" type="text" name="marca" placeholder="Insira aqui a marca" value="<?php echo($dados[0][7])?>"/><br />
									<?php
									if(isset($_SESSION['erros'])){
										switch ($_SESSION['erros']){
											case 1:
												echo ('<p>Há dados repetidos, tente novamente...</p>');
												$_SESSION['erros'] = 0;
											break;
											case 2:
												echo ('<p>Você inseriu um telefone inválido, tente novamente...</p>');
												$_SESSION['erros'] = 0;
											break;
										}
									} else {
										$_SESSION['erros'] = 0;
									}
									echo ('<div class="div-button">
											<a href="usuarios.php"><button class="btn_submit" type="button">Voltar</button></a>
											<input class="btn_submit" name="enviar" type="submit" value="Enviar"/>
									</div>');
									} elseif($alterar == 'seguranca'){?>
									<input type="hidden" name="hidden" value="seguranca"/>
									<h2>Nome:</h2>
									<input class="campo_nome" type="text" name="username" placeholder="Insira aqui o nome" value="<?php echo($dados[0][1])?>" /><br />
									<h2>Login:</h2>
									<input class="campo_login" type="text" name="login" placeholder="Insira aqui o login" value="<?php echo($dados[0][2])?>"/><br />
									<h2>Senha:</h2>
									<input class="campo_password" type="password" name="senha" placeholder="Insira aqui a senha" required/><br />
									<h2>Telefone:</h2>
									<input class="campo_telefone" type="text" minlength="13" name="tel" placeholder="Insira aqui o telefone" value="<?php echo (formatarFoneSeg($linha));?>" required/><br />
									<?php
									if(isset($_SESSION['erros'])){
										switch ($_SESSION['erros']){
											case 1:
												echo ('<p>Há dados repetidos, tente novamente...</p>');
												$_SESSION['erros'] = 0;
											break;
											case 2:
												echo ('<p>Você inseriu um telefone inválido, tente novamente...</p>');
												$_SESSION['erros'] = 0;
											break;
										}
									} else {
										$_SESSION['erros'] = 0;
									}
									echo ('<div class="div-button">
											<a href="segurancas.php"><button class="btn_submit" type="button">Voltar</button></a>
											<input class="btn_submit" name="enviar" type="submit" value="Enviar"/>
									</div>');
								}?>
							</form>
						</div>
					</div>
				</section>
		</div>
		<?php 
			include_once('../includes/footer.php');
		?>
	</body>
	<script>
		mascaraTelefone(formulario.tel);
		$('[name="placa"]').keyup(mascaraPlaca);
	</script>
</html>